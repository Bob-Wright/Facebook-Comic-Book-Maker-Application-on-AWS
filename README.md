# Facebook-Comic-Book-Maker-Application-on-AWS
This tutorial repository contains information and instructions about how to set up an example Facebook application on an Amazon Web Services (AWS) hosted website. The site runs on a Bitnami Ubuntu Linux, Apache, mySQL, and PHP (LAMP) stack server in the Amazon cloud. This document assumes that the LAMP stack is already set up and functional and that its command console is accessible through a terminal program like PuTTY, and it assumes some familiarity with the LAMP stack and its components. It is also assumed that the site already has an SSL certificate installed and operating correctly. The tutorial will initially focus more upon the server application setup than it will upon the details of the application's functions and code. All of the code for the application itself is also included in the repository, and after the filesystem setups this tutorial continues with explanations about the structure of the builder application and the functions of its programs.

Setting up the application on Facebook requires that the application code is already written and functional, and that the host site URLs are accessible and active. So we will have to set all of that up before we can add the application to Facebook itself. The tutorial concludes with a few screenshots that provide a brief overview of setting the application up on Facebook.

For this example application we will use the idea of a comic book maker or "builder" named Storybook that will create and host web comics from user provided input data. The entry point for the comic book builder is from a comics gallery page. Once the comic is created it will be hosted on the website and displayed in the gallery along with other comics. The gallery on our actual Storybook site contains a few comics besides this example.
"https://syntheticreality.net/Comics/Comics.php"

The comics created by the builder use a responsive design and incorporate the Bootstrap framework, so the site responds to the viewing device characteristics. The builder itself is probably best viewed on a laptop or desktop.

It is suggested that you read over the tutorial completely before you begin performing the operations described. Additionally some of the example code will require editing to suit your environment and domain before it can be used.

Comments and suggestions are appreciated. So are bug reports.
