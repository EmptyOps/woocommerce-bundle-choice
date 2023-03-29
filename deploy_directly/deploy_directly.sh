#!/usr/bin/env bash

read -p "Are you sure, you want to push the update to wordpress.org site? please enter YES in capital" yn
if [[ "$yn" != "YES" ]]; then
    echo "Confirmation failed"
    exit; 
fi

read -p "Are you sure, you want to push the update to wordpress.org site? Please confirm again. Please enter YES_AGAIN in capital" yn
if [[ "$yn" != "YES_AGAIN" ]]; then
    echo "Confirmation failed"
    exit; 
fi

read -p "Please confirm readme.txt file is updated? please enter YES in capital" yn
if [[ "$yn" != "YES" ]]; then
    echo "Confirmation failed"
    exit; 
fi

read -p "Please confirm readme.txt file is updated? Please confirm again. Please enter YES_UPDATED in capital" yn
if [[ "$yn" != "YES_UPDATED" ]]; then
    echo "Confirmation failed"
    exit; 
fi


read -p "Please enter WordPress.org password" WP_ORG_PASSWORD
if [[ -z "$WP_ORG_PASSWORD" ]]; then
    echo "WordPress.org password not set"
    exit 1
fi

TRAVIS_BRANCH=$(git branch | sed -n -e 's/^\* \(.*\)/\1/p')
if [[ -z "$TRAVIS_BRANCH" || "$TRAVIS_BRANCH" != "master" ]]; then
    echo "Build branch is required and must be 'master'"
    exit 0
fi

WP_ORG_USERNAME="emptyopssphere"
PLUGIN="woo-bundle-choice"
PROJECT_ROOT="$( cd "$( dirname "${BASH_SOURCE[0]}" )/.." && pwd )"
PLUGIN_BUILDS_PATH="$PROJECT_ROOT/build"
PLUGIN_BUILD_CONFIG_PATH="$PROJECT_ROOT/build-cfg"
VERSION=$(php -f "$PLUGIN_BUILD_CONFIG_PATH/utils/version.php")

# Check if the tag exists for the version we are building
TAG=$(svn ls "https://plugins.svn.wordpress.org/$PLUGIN/tags/$VERSION")
error=$?
# if [ $error == 0 ]; then
#     # Tag exists, don't deploy
#     echo "Tag already exists for version $VERSION, aborting deployment"
#     exit 1
# fi
  
cd "$PLUGIN_BUILDS_PATH"
# Remove any file so we start from scratch
rm -fR "*"

# Unzip the built plugin
#unzip -q -o "$ZIP_FILE"

# Copy all but testing and deployment files.

## include option is simple but risky since when if we add some new plugin files/folders we may forget to include that, so should better keep in mind and take care of it. 
# create list of exclude based on include definition so include list is still needed 
    # {'application','asset','languages','index.php','README.txt','uninstall.php','woo-bundle-choice.php'}
# exclude_list="{"
exclude_list=()
shopt -s dotglob
for f in "$PROJECT_ROOT"/*; do
    bname=$(basename "$f")
        
    if [ "$bname" == "application" ] || [ "$bname" == "asset" ] || [ "$bname" == "languages" ] || [ "$bname" == "templates " ] || [ "$bname" == "index.php" ] || [ "$bname" == "README.txt" ] || [ "$bname" == "uninstall.php" ] || [ "$bname" == "LICENSE" ] || [ "$bname" == "LICENSE.txt" ] || [ "$bname" == "woo-bundle-choice.php" ]; 
    then
        tmp="nothing to do"
    else 

        # if [ "$exclude_list" == "{" ];
        # then
            # exclude_list="${exclude_list} '${bname}'"
            exclude_list+=("${bname}")
        # else
        #     # exclude_list="${exclude_list}, '${bname}'"
        #     exclude_list+=("${bname}")
        # fi
    fi
done 
# exclude_list="${exclude_list} }"

# echo "exclude_list... ${exclude_list}"
echo "exclude_list... ${exclude_list[@]/#/--exclude=}"

# # rsync -avr --exclude={'LICENSE','node_modules','package.json','bin','.phpcs.xml.dist','build','.phpintel','build-cfg','phpunit.xml.dist','codeception.dist.php.7.2.yml','codeception.dist.yml','tests','codeception.yml','travis.sh','composer.json','__.travis.yml','composer.lock','.travis.yml','deploy','__dev_readme.txt','vendor','.DS_Store','.git','wordpress-dev-light-php-only-0.1','.gitignore','wordpress-from-wordpress.org-download','wp-cli.phar','karma.conf.js','wp-content'} "$PROJECT_ROOT/" "$PLUGIN_BUILDS_PATH/$PLUGIN"
# rsync -avr --exclude=$exclude_list "$PROJECT_ROOT/" "$PLUGIN_BUILDS_PATH/$PLUGIN"
rsync -avr "${exclude_list[@]/#/--exclude=}" "$PROJECT_ROOT/" "$PLUGIN_BUILDS_PATH/$PLUGIN"


# Checkout the SVN repo
svn co -q "http://svn.wp-plugins.org/$PLUGIN" svn

echo "checkout done"


read -p "Do you want to run svn cleanup? please enter YES in capital" yn
if [[ "$yn" == "YES" ]]; then
    
    read -p "Do you want to run svn cleanup? Please confirm again. Please enter YES_DO_CLEANUP in capital" yn
    if [[ "$yn" == "YES_DO_CLEANUP" ]]; then
        svn cleanup
    fi
fi


# Move out the trunk directory to a temp location
mv svn/trunk ./svn-trunk
# Create trunk directory
mkdir svn/trunk
# Copy our new version of the plugin into trunk
rsync -r -p $PLUGIN/* svn/trunk

echo "rsync done"


# Copy all the .svn folders from the checked out copy of trunk to the new trunk.

# This is necessary as the Travis container runs Subversion 1.6 which has .svn dirs in every sub dir
cd svn/trunk/
TARGET=$(pwd)
cd ../../svn-trunk/

# Find all .svn dirs in sub dirs
SVN_DIRS=`find . -type d -iname .svn`

for SVN_DIR in $SVN_DIRS; do
    SOURCE_DIR=${SVN_DIR/.}
    TARGET_DIR=$TARGET${SOURCE_DIR/.svn}
    TARGET_SVN_DIR=$TARGET${SVN_DIR/.}
    if [ -d "$TARGET_DIR" ]; then
        # Copy the .svn directory to trunk dir
        cp -r $SVN_DIR $TARGET_SVN_DIR
    fi
done

echo "Copy dierectories done"


# Back to builds dir
cd ../

# Remove checked out dir
rm -fR svn-trunk

# Add new version tag
mkdir svn/tags/$VERSION
rsync -r -p $PLUGIN/* svn/tags/$VERSION

echo "rsync done again"


# Add new files to SVN
svn stat svn | grep '^?' | awk '{print $2}' | xargs -I x svn add x@
# Remove deleted files from SVN
svn stat svn | grep '^!' | awk '{print $2}' | xargs -I x svn rm --force x@
svn stat svn

# Commit to SVN
svn ci --no-auth-cache --username $WP_ORG_USERNAME --password $WP_ORG_PASSWORD svn -m "Deploy version $VERSION"

echo "commit done"


# Remove SVN temp dir
rm -fR svn

echo "done"
