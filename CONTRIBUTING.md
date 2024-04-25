# Contributing to BUNDLOICE(formerly WOO CHOICE PLUGIN)
We love your input! We want to make contributing to this project as easy and transparent as possible, whether it's:

- Reporting a bug
- Discussing the current state of the code
- Submitting a fix
- Proposing new features
- Becoming a maintainer

## We Develop with Github
We use github to host code, to track issues and feature requests, as well as accept pull requests.
If you do not have experience of making pull request or if you have any question regarding pull requests then follow below links:

[Youtube Video](https://www.youtube.com/watch?v=jRLGobWwA3Y)(with git bash) or
[Youtube Video](https://www.youtube.com/watch?v=YTbRzhQju4c&ab_channel=PippinWilliamson)(simple way direlty on github website without command line involved. But this is an older website video. So, be sure to find the right action on newer website) or
[makeapullrequest.com](https://makeapullrequest.com/) or
[www.firsttimersonly.com](https://www.firsttimersonly.com/)

## We Use [Github Flow](https://guides.github.com/introduction/flow/index.html), So All Code Changes Happen Through Pull Requests
Pull requests are the best way to propose changes to the codebase (we use [Github Flow](https://guides.github.com/introduction/flow/index.html)). We actively welcome your pull requests:

- Fork the repo and create your branch from `ui_QCed_bhavesh_pull_request`.
- If you've added code that should be tested, then follow below steps:

    - Create a ZIP File of the Plugin

      Create zip file of below mentioned folders and files. In our repository you will find many folders and files but you will need only below list of folders and files to test the plugin:
       - applications/
       - asset/
       - languages/ 
       - templates/
       - vendor/
          - Sphreplugins/
          - Composer/
          - autoload.php/
       - index.php
       - licence.txt
       - readme.txt
       - unistall.php
       - woo-bundle-choice.php  


    - Install or Update the Plugin on your WordPress Site

      You can install or update above created zip file from the wordpress admin plugins page. Or Otherwise you can directly overwrite the content of the above created zip file into the folder `your-wordpress-site-root/wp-content/plugins/woo-bundle-choice`.

    - Test the plugin functionality with necessary scenarios.

- Send your pull request!

  - If you do not have experience of making pull request or if you have any question regarding pull requests then follow below links:

      - [Youtube Video](https://www.youtube.com/watch?v=jRLGobWwA3Y)(with git bash) 
      -  [Youtube Video](https://www.youtube.com/watch?v=YTbRzhQju4c&ab_channel=PippinWilliamson)(simple way direlty on github website without command line involved. But this is an older website video. So, be sure to find the right action on newer website) 
      -  [makeapullrequest.com](https://makeapullrequest.com/) 
      - [www.firsttimersonly.com](https://www.firsttimersonly.com/)


## Any contributions you make will be under the License of this Git Hub Repository. 
In short, when you submit code changes, your submissions are understood to be under the same License of this repository. 

## Report bugs using Github's [issues](https://github.com/EmptyOps/woocommerce-bundle-choice/issues/)
We use GitHub issues to track public bugs. Report a bug by [opening a new issue](https://wordpress.org/support/plugin/woo-bundle-choice/); it's that easy!

## Write bug reports with detail, background, and sample code
[This is an example](http://stackoverflow.com/q/12488905/180626) of a bug report I wrote, and I think it's not a bad model. Here's [another example from Craig Hockenberry](http://www.openradar.me/11905408), an app developer whom I greatly respect.

**Great Bug Reports** tend to have:

- A quick summary and/or background
- Steps to reproduce
  - Be specific!
  - Give sample code if you can. [My stackoverflow question](http://stackoverflow.com/q/12488905/180626) includes sample code that *anyone* with a base R setup can run to reproduce what I was seeing
- What you expected would happen
- What actually happens
- Notes (possibly including why you think this might be happening, or stuff you tried that didn't work)

People *love* thorough bug reports. I'm not even kidding.

## Use a Consistent Coding Style
I'm again borrowing these from [Facebook's Guidelines](https://github.com/facebook/draft-js/blob/a9316a723f9e918afde44dea68b5f9f39b7d9b00/CONTRIBUTING.md)

* 4 spaces for indentation rather than tabs
* Control statement include if, for, while, switch, etc. Control statements should have one space between the control keyword and opening parenthesis, to distinguish them from function calls.
* PHP keywords MUST be in lower case.
* There MUST be one space after and before each operator.

## Code of Conduct



### Our Pledge

In the interest of fostering an open and welcoming environment, we as
contributors and maintainers pledge to making participation in our project and
our community a harassment-free experience for everyone, regardless of age, body
size, disability, ethnicity, gender identity and expression, level of experience,
nationality, personal appearance, race, religion, or sexual identity and
orientation.

### Our Standards

Examples of behavior that contributes to creating a positive environment
include:

* Using welcoming and inclusive language
* Being respectful of differing viewpoints and experiences
* Gracefully accepting constructive criticism
* Focusing on what is best for the community
* Showing empathy towards other community members

Examples of unacceptable behavior by participants include:

* The use of sexualized language or imagery and unwelcome sexual attention or
advances
* Trolling, insulting/derogatory comments, and personal or political attacks
* Public or private harassment
* Publishing others' private information, such as a physical or electronic
  address, without explicit permission
* Other conduct which could reasonably be considered inappropriate in a
  professional setting

### Our Responsibilities

Project maintainers are responsible for clarifying the standards of acceptable
behavior and are expected to take appropriate and fair corrective action in
response to any instances of unacceptable behavior.

Project maintainers have the right and responsibility to remove, edit, or
reject comments, commits, code, wiki edits, issues, and other contributions
that are not aligned to this Code of Conduct, or to ban temporarily or
permanently any contributor for other behaviors that they deem inappropriate,
threatening, offensive, or harmful.

### Scope

This Code of Conduct applies both within project spaces and in public spaces
when an individual is representing the project or its community. Examples of
representing a project or community include using an official project e-mail
address, posting via an official social media account, or acting as an appointed
representative at an online or offline event. Representation of a project may be
further defined and clarified by project maintainers.

### Enforcement

Instances of abusive, harassing, or otherwise unacceptable behavior may be
reported by contacting the project team at [support@sphereplugins.com]. All
complaints will be reviewed and investigated and will result in a response that
is deemed necessary and appropriate to the circumstances. The project team is
obligated to maintain confidentiality with regard to the reporter of an incident.
Further details of specific enforcement policies may be posted separately.

Project maintainers who do not follow or enforce the Code of Conduct in good
faith may face temporary or permanent repercussions as determined by other
members of the project's leadership.

### Attribution

This Code of Conduct is adapted from the [Gist Github][homepage].

[homepage]: https://gist.github.com/PurpleBooth/b24679402957c63ec426
## License
By contributing, you agree that your contributions will be licensed under the License of this Git Hub Repository.

## References
This document was adapted from the open-source contribution guidelines for [Facebook's Draft](https://github.com/facebook/draft-js/blob/a9316a723f9e918afde44dea68b5f9f39b7d9b00/CONTRIBUTING.md) and [gist.github.com/briandk](https://gist.github.com/briandk/3d2e8b3ec8daf5a27a62)