#!/usr/bin/env bash

WP_CORE_DIR=${WP_CORE_DIR-$WP_DEVELOP_DIR/}

# Install WordPress.
install-wordpress() {

	mkdir -p "$WP_DEVELOP_DIR"

	# Clone the WordPress develop repo.
	git clone --depth=1 --branch="$WP_VERSION" git://develop.git.wordpress.org/ "$WP_DEVELOP_DIR"

	cd "$WP_DEVELOP_DIR"

	# Set up tests config.
	cp wp-tests-config-sample.php wp-config.php
	sed -i "s/youremptytestdbnamehere/wordpress_test/" wp-config.php
	sed -i "s/yourusernamehere/root/" wp-config.php
	sed -i "s/yourpasswordhere//" wp-config.php

	#set debug mode, temporarily,
	sed -i -e "s/define('WP_DEBUG', false);/define('WP_DEBUG', true);/g" wp-config.php
	sed -i -e 's/define("WP_DEBUG", false);/define("WP_DEBUG", true);/g' wp-config.php

	# Set up database.
	mysql -e 'CREATE DATABASE wordpress_test;' -uroot

	# Configure WordPress for access through a web server.
	sed -i "s/'example.org'/'$WP_CEPT_SERVER'/" wp-config.php

	# Install.
	php tests/phpunit/includes/install.php wp-config.php "$WP_MULTISITE"

	# Support multisite.
	if [[ $WP_MULTISITE = 1 ]]; then

		# Update the config to enable multisite.
		echo "
			define( 'MULTISITE', true );
			define( 'SUBDOMAIN_INSTALL', false );
			\$GLOBALS['base'] = '/';
		" >> wp-config.php
	fi

	# Update the config to actually load WordPress.
	echo "require_once(ABSPATH . 'wp-settings.php');" >> wp-config.php

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

composer_and_wp_plugins_install_update() {

	#wp root
	# composer install -d ${WP_CORE_DIR}
	#composer require codeception/module-webdriver -d ${WP_CORE_DIR} --dev
    composer install -d ${WP_CORE_DIR} #--prefer-source
    #composer update -d ${WP_CORE_DIR} #--prefer-source

	# php /tmp/wordpress/wp plugin activate woocommerce

    # #build root
    # composer require codeception/module-webdriver --dev
    # composer install #--prefer-source
    # composer update #--prefer-source

    ls -l /tmp/wordpress/src/
    ls -l /tmp/wordpress/src/wp-content
    ls -l /tmp/wordpress/src/wp-content/themes
    ls -l /tmp/wordpress/src/wp-content/themes/twentyseventeen
}

# EOF