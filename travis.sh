#!/usr/bin/env bash

WP_CORE_DIR=${WP_CORE_DIR-$WP_DEVELOP_DIR/}

# Install WordPress.
install-wordpress() {

	# mkdir -p "$WP_DEVELOP_DIR"

	# Clone the WordPress develop repo.
	# git clone --depth=1 --branch="$WP_VERSION" git://develop.git.wordpress.org/ "$WP_DEVELOP_DIR"
	# git clone --depth=1 --branch="$WP_VERSION" https://github.com/WordPress/WordPress "$WP_DEVELOP_DIR"
	# git clone --depth=1 --branch="$WP_VERSION" https://github.com/WordPress/wordpress-develop "$WP_DEVELOP_DIR"
	# cp -R wordpress-dev-light-php-only-0.1/* "$WP_DEVELOP_DIR/"


	#from local copy

	#
	# copy wordpress from local copy. 
	#
	# here based on different testing environments defined for WBC we may need to copy different wordpress which are configured specifically for the test environment's requirement 

	echo $(test_environment)
	if [[ $(test_environment) == "WBC_TEST_ENV_default" ]]; then
		echo "default if condition"

		mkdir -p "$WP_DEVELOP_DIR"

		cp -R wordpress-from-wordpress.org-download/wordpress/* "$WP_DEVELOP_DIR/"

		cd "$WP_DEVELOP_DIR"
	else 
		echo "other else condition"

		# copy other environment sites 
		mkdir -p "$SERVER_ROOT_DIR"tmp/WBC_TEST_ENV_with_sample_data/wordpress-latest-1
		cp -R wordpress-from-wordpress.org-download/WBC_TEST_ENV_with_sample_data/wordpress-latest-1/* "$SERVER_ROOT_DIR"tmp/WBC_TEST_ENV_with_sample_data/wordpress-latest-1/

		cd "$SERVER_ROOT_DIR"tmp/WBC_TEST_ENV_with_sample_data/wordpress-latest-1/
	fi


	# # Set up tests config.
	# # cp wp-tests-config-sample.php wp-config.php
	# cp wp-config-sample.php wp-config.php
	# # sed -i "s/youremptytestdbnamehere/wordpress_test/" wp-config.php
	# # sed -i "s/yourusernamehere/root/" wp-config.php
	# # sed -i "s/yourpasswordhere//" wp-config.php
	# sed -i "s/database_name_here/wordpress_test/" wp-config.php
	# sed -i "s/username_here/root/" wp-config.php
	# sed -i "s/password_here//" wp-config.php

	# #set debug mode, temporarily,
	# sed -i -e "s/define('WP_DEBUG', false);/define('WP_DEBUG', true);/g" wp-config.php
	# sed -i -e 's/define("WP_DEBUG", false);/define("WP_DEBUG", true);/g' wp-config.php

	# # Set up database.
	# mysql -e 'CREATE DATABASE wordpress_test;' -uroot

	# #populate db  when from local copy
	# echo "populating database"
	# mysql_config_editor set --login-path=local --host=localhost --user=root --password
	# echo "populating database 1"
	# # mysql -uroot --password='' -p wordpress_test < db.sql
	# mysql --login-path=local  -p wordpress_test < db.sql
	# echo "populating database done"
	

	# # Configure WordPress for access through a web server.
	# sed -i "s/'example.org'/'$WP_CEPT_SERVER'/" wp-config.php

	# Install.
	# php tests/phpunit/includes/install.php wp-config.php "$WP_MULTISITE"
	# php wp-admin/install.php wp-config.php "$WP_MULTISITE"

	# # Support multisite.
	# if [[ $WP_MULTISITE = 1 ]]; then

	# 	# Update the config to enable multisite.
	# 	echo "
	# 		define( 'MULTISITE', true );
	# 		define( 'SUBDOMAIN_INSTALL', false );
	# 		\$GLOBALS['base'] = '/';
	# 	" >> wp-config.php
	# fi

	# # Update the config to actually load WordPress.
	# echo "require_once(ABSPATH . 'wp-settings.php');" >> wp-config.php

	cd -
}

download() {
    if [ `which curl` ]; then
        curl -s "$1" > "$2";
    elif [ `which wget` ]; then
        wget -nv -O "$2" "$1"
    fi
}

install_test_suite() {

	WP_TESTS_DIR=${WP_TESTS_DIR-/tmp/wordpress-tests-lib}
	DB_HOST=${4-localhost}

	WP_VERSION=${5-latest}

	if [[ $WP_VERSION =~ ^[0-9]+\.[0-9]+\-(beta|RC)[0-9]+$ ]]; then
		WP_BRANCH=${WP_VERSION%\-*}
		WP_TESTS_TAG="branches/$WP_BRANCH"

	elif [[ $WP_VERSION =~ ^[0-9]+\.[0-9]+$ ]]; then
		WP_TESTS_TAG="branches/$WP_VERSION"
	elif [[ $WP_VERSION =~ [0-9]+\.[0-9]+\.[0-9]+ ]]; then
		if [[ $WP_VERSION =~ [0-9]+\.[0-9]+\.[0] ]]; then
			# version x.x.0 means the first release of the major version, so strip off the .0 and download version x.x
			WP_TESTS_TAG="tags/${WP_VERSION%??}"
		else
			WP_TESTS_TAG="tags/$WP_VERSION"
		fi
	elif [[ $WP_VERSION == 'nightly' || $WP_VERSION == 'trunk' ]]; then
		WP_TESTS_TAG="trunk"
	else
		# http serves a single offer, whereas https serves multiple. we only want one
		download http://api.wordpress.org/core/version-check/1.7/ /tmp/wp-latest.json
		grep '[0-9]+\.[0-9]+(\.[0-9]+)?' /tmp/wp-latest.json
		LATEST_VERSION=$(grep -o '"version":"[^"]*' /tmp/wp-latest.json | sed 's/"version":"//')
		if [[ -z "$LATEST_VERSION" ]]; then
			echo "Latest WordPress version could not be found"
			exit 1
		fi
		WP_TESTS_TAG="tags/$LATEST_VERSION"
	fi

	# portable in-place argument for both GNU sed and Mac OSX sed
	if [[ $(uname -s) == 'Darwin' ]]; then
		local ioption='-i.bak'
	else
		local ioption='-i'
	fi

	# set up testing suite if it doesn't yet exist
	if [ ! -d $WP_TESTS_DIR ]; then
		# set up testing suite
		mkdir -p $WP_TESTS_DIR
		svn co --quiet https://develop.svn.wordpress.org/${WP_TESTS_TAG}/tests/phpunit/includes/ $WP_TESTS_DIR/includes
		svn co --quiet https://develop.svn.wordpress.org/${WP_TESTS_TAG}/tests/phpunit/data/ $WP_TESTS_DIR/data
	fi

	if [ ! -f wp-tests-config.php ]; then
		download https://develop.svn.wordpress.org/${WP_TESTS_TAG}/wp-tests-config-sample.php "$WP_TESTS_DIR"/wp-tests-config.php
		# remove all forward slashes in the end
		WP_CORE_DIR=$(echo $WP_CORE_DIR | sed "s:/\+$::")
		sed $ioption "s:dirname( __FILE__ ) . '/src/':'$WP_CORE_DIR/':" "$WP_TESTS_DIR"/wp-tests-config.php
		sed $ioption "s/youremptytestdbnamehere/wordpress_test/" "$WP_TESTS_DIR"/wp-tests-config.php
		sed $ioption "s/yourusernamehere/root/" "$WP_TESTS_DIR"/wp-tests-config.php
		sed $ioption "s/yourpasswordhere//" "$WP_TESTS_DIR"/wp-tests-config.php
		sed $ioption "s|localhost|${DB_HOST}|" "$WP_TESTS_DIR"/wp-tests-config.php
	fi

}

move_things() {
	curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar > wp
	chmod +x wp
	mv wp /tmp/wordpress/

	echo "Moving composer.json"
	#composer config -g github-oauth.github.com $GIT_TOKEN
	#cp composer.json ${WP_CORE_DIR}
	mv composer.json ${WP_CORE_DIR}
	
	#commented and moved to composer function
	# composer install -d ${WP_CORE_DIR}
	# php /tmp/wordpress/wp plugin activate woocommerce
}

copy_wbc() {

	cp -Rf "$1"application "$2"
	cp -Rf "$1"asset "$2"
	cp -Rf "$1"index.php "$2"
	cp -Rf "$1"languages "$2"
	cp -Rf "$1"uninstall.php "$2"
	cp -Rf "$1"woocommerce-bundle-choice.php "$2"
}

composer_and_wp_plugins_install_update() {

	# #wp root
	# # composer install -d ${WP_CORE_DIR}
	# #composer require codeception/module-webdriver -d ${WP_CORE_DIR} --dev
 #    composer install -d ${WP_CORE_DIR} #--prefer-source
 #    #composer update -d ${WP_CORE_DIR} #--prefer-source
	# php /tmp/wordpress/wp plugin activate woocommerce

	#clone/move and activate woo choice plugin itself to wp dir
		# mkdir /tmp/wordpress/src/wp-content/plugins/woo-bundle-choice 	#commented temporarily since the plugin is activated on manually on local wordress site 

		# remove # 		
		if [[ $(test_environment) == "WBC_TEST_ENV_default" ]]; then
			rm -rf /tmp/wordpress/src/wp-content/plugins/woo-bundle-choice/*	#removing to ensure that no bug can occur in recursive copy where in some linux force overwrite fails
		else 
			# for other environment sites
			rm -rf "$SERVER_ROOT_DIR"tmp/WBC_TEST_ENV_with_sample_data/wordpress-latest-1/wp-content/plugins/woo-bundle-choice/* 
		fi

		# copy #
		if [[ $(test_environment) == "WBC_TEST_ENV_default" ]]; then
			copy_wbc "$TRAVIS_BUILD_DIR"/ /tmp/wordpress/src/wp-content/plugins/woo-bundle-choice/
		else 
			# for other environment sites
			copy_wbc "$TRAVIS_BUILD_DIR"/ "$SERVER_ROOT_DIR"tmp/WBC_TEST_ENV_with_sample_data/wordpress-latest-1/wp-content/plugins/woo-bundle-choice/ 
		fi
		
		# git clone --depth=1 --branch=dev https://github.com/EmptyOps/woocommerce-bundle-choice /tmp/wordpress/src/wp-content/plugins #clone option no more used, since copy above is from clone already
		# php /tmp/wordpress/wp plugin activate woo-bundle-choice	#commented temporarily since the plugin is activated on manually on local wordress site

	#call sh function to adjust test files/folders
	move_and_remove_tests

    # #build root
    # composer require codeception/module-webdriver --dev
    # composer install #--prefer-source
    # composer update #--prefer-source
    
}

#create sh function to remove unwanted test from site test folder and build root dir test folder
move_and_remove_tests() {

	##first adjust tests folder on site dir
	#better than that is to run simple post form acceptance tests on the admin panel woo choice plugin pages directly  

	#adjust test folder on build root dir
	#if acceptance test is used for admin then remove below listed dir and files from the repo itself so that on travis no need to do below clean up
	rm -rf "$TRAVIS_BUILD_DIR"/tests/library
	rm -rf "$TRAVIS_BUILD_DIR"/tests/model
	rm -rf "$TRAVIS_BUILD_DIR"/tests/view
	rm -rf "$TRAVIS_BUILD_DIR"/tests/wc
	rm -f "$TRAVIS_BUILD_DIR"/tests/bootstrap.php

}

#test environment 
test_environment() {

	PHP_VERSION=$(php -v | head -n 1 | cut -d " " -f 2)
	# echo "PHP_VERSION..."
	# echo "$PHP_VERSION"

	# set here the latest version that we are using for testing in default environment 
	# if [[ "7.2.32" == *"$PHP_VERSION"* ]]; then
	if [[ "7.3.20" == *"$PHP_VERSION"* ]]; then
	  echo "WBC_TEST_ENV_default"
	else 
	  echo "WBC_TEST_ENV_with_sample_data"
	fi
}

#edit codeception yml file as per test environment 
edit_codeception_yml_file() {

	# portable in-place argument for both GNU sed and Mac OSX sed
	if [[ $(uname -s) == 'Darwin' ]]; then
		local ioption='-i.bak'
	else
		local ioption='-i'
	fi

	# set here the latest version that we are using for testing in default environment 
	if [[ $(test_environment) == "WBC_TEST_ENV_default" ]]; then
	  echo "setting url for default environment"
	  sed $ioption "s|http://127.0.0.1:8888|http://127.0.0.1:8888/tmp/wordpress/src|" "$TRAVIS_BUILD_DIR"/tests/acceptance.suite.yml
	  sed $ioption "s|http://127.0.0.1:8888|http://127.0.0.1:8888/tmp/wordpress/src|" "$TRAVIS_BUILD_DIR"/codeception.dist.yml
	else 
	  echo "setting url for other environment"
	  sed $ioption "s|http://127.0.0.1:8888|http://127.0.0.1:8888/tmp/WBC_TEST_ENV_with_sample_data/wordpress-latest-1|" "$TRAVIS_BUILD_DIR"/tests/acceptance.suite.yml
	  sed $ioption "s|http://127.0.0.1:8888|http://127.0.0.1:8888/tmp/WBC_TEST_ENV_with_sample_data/wordpress-latest-1|" "$TRAVIS_BUILD_DIR"/codeception.dist.yml
	fi
}

#echo the necessary output 
echo_necessary_output() {

	#look into entire dir
	ls -l tests/_output/

	# test="$(cat DSC_0251.JPG | base64)"
	find tests/_output/ \( -iname \*.jpg -o -iname \*.jpeg -o -iname \*.png \) -print0 | while read -r -d $'\0' file; do
	  # base="${file##*/}" $base is the file name with all the directory stuff stripped off
	  # dir="${file%/*}    $dir is the directory with the file name stripped off
	  echo "$file"
	  test="$(cat $file | base64)"
	  echo "$test"
	done
}

# EOF