<?php


    $file = fopen("texti.txt", "r") or die("Unable to open file!");
    echo fread($file,filesize("texti.txt"));
    fclose($file);


$myfile = fopen("texti.txt", "w") ;
$txt = "Our Terms and Conditions template will get you started with creating your own custom Terms and Conditions agreement.

This template is free to download and use for your website or mobile app.

A Terms and Conditions agreement is the agreement that includes the terms, the rules and the guidelines of acceptable behavior and other useful sections to which users must agree in order to use or access your website and mobile app.

1. What are Terms and Conditions
1.1. What to include in a Terms and Conditions
1.2. Is a Terms and Conditions required?
1.3. How to enforce Terms and Conditions
2. Examples of Terms and Conditions
3. Download Terms and Conditions Template

1. What are Terms and Conditions
Terms and Conditions agreements act as a legal contract between you (the company) who has the website or mobile app and the user who access your website and mobile app.

Having a Terms and Conditions agreement is completely optional. No laws require you to have one. Not even the super-strict and wide-reaching General Data Protection Regulation (GDPR).

It's up to you to set the rules and guidelines that the user must agree to. You can think of your Terms and Conditions agreement as the legal agreement where you maintain your rights to exclude users from your app in the event that they abuse your app, where you maintain your legal rights against potential app abusers, and so on.

Terms and Conditions are also known as Terms of Service or Terms of Use.

You can use this agreement anywhere, regardless of what platform your business operates on:

Websites
WordPress blogs or blogs on any kind of platform: Joomla!, Drupal etc.
E-commerce shops
Mobile apps: iOS, Android or Windows phone
Facebook apps
Desktop apps
SaaS apps
Desktop apps usually have an EULA (End-User License Agreement) instead of a Terms and Conditions agreement, but your business can use both. Mobile apps are increasingly using Terms and Conditions along with an EULA if the mobile app has an online service component, i.e. it connects with a server.

1.1. What to include in a Terms and Conditions
In your Terms and Conditions, you can include rules and guidelines on how users can access and use your website and mobile app.

Use the Terms and Conditions Generator to create the Terms & Conditions agreement.

Download the Terms and Conditions template by clicking here. It's free.

Here are a few examples:

The Intellectual Property disclosure will inform users that the contents, logo and other visual media you created is your property and is protected by copyright laws.
A Termination clause will inform that users' accounts on your website and mobile app or users' access to your website and mobile (if users can't have an account with you) can be terminated in case of abuses or at your sole discretion.
A Governing Law will inform users which laws govern the agreement. This should the country in which your company is headquartered or the country from which you operate your website and mobile app.
A Links To Other Web Sites clause will inform users that you are not responsible for any third party websites that you link to. This kind of clause will generally inform users that they are responsible for reading and agreeing (or disagreeing) with the Terms and Conditions or Privacy Policies of these third parties.
If your website or mobile app allows users to create content and make that content public to other users, a Content section will inform users that they own the rights to the content they have created. The \"Content\" clause usually mentions that users must give you (the website or mobile app developer) a license so that you can share this content on your website/mobile app and to make it available to other users.\n";
fwrite($myfile, $txt);

fclose($myfile);
?>


