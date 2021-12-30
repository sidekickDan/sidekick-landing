SideKick LP



ABOUT THIS TEMPLATE
This template is in actuality the "Landing Page" template designed by Start Bootstrap. It was designed as a free Mobile Responsive template based on Bootstrap 3. I modified it so that it could be used in a Joomla environment because of it's well designed layouts, mobile first philosophy, and the need for an effective yet simple approach for building client websites. The goal is to give designers familiar with css an easier and more consistent way of creating a mobile responsive site without having to create all sorts of crazy breakpoints, custom css classes, etc that are hard to remember and keep consistent among contractors who work on a site. Below you will find some notes and tips. Feel free to modify in harmony with the license the original template was released under. 

Please let me know if you find any bugs are possible features to add that are missing. 

TO DO



HELPFUL NOTES
CSS classes - To help control layouts and make use of built in typography consult the  GetBootstrap Website - http://getbootstrap.com/css/

Layout Tips - The main template controls layouts using the above css classes. For example, "col-lg-4, col-md-4, col-sm-4, col-xs-4, push, pull, etc etc" so study up on bootstrap 3. I included some feature positions with sample module width layouts as examples. Feel free to add as many as you need in whatever configuration. There's css support in bootstrap 3 for fixed width and fluid width websites. So again, study up on bootstrap 3!

Fixed Width vs Fluid Width - Bootstrap has support for both. Consult their css page above for more information. However, on the .container class you can change it to, .container-fluid, and it should make it a fluid width. However, you might set a css media query to limit the width on really wide screen sizes such as those over 2 or 3 thousand pixels so layouts don't get destroyed on super larger monitors. 

Hiding and Displaying Modules Based On Screen Size - Study bootstrap 3's responsive utility classes to hide or display modules on a certain view. This is helpful if you want some call buttons to be displayed on a phone view, but not seen on a desktop or tablet view. Classes such as ... visible-lg, visible-md, hidden-lg, hidden-md  ... can be added to the module class suffix field of modules to selectively hide/display content based on screen sizes. http://getbootstrap.com/css/#responsive-utilities

Main Menu - Just place your main menu into a menu module and place it into the navigation position. In the advanced settings for the menu module, under "Alternative Layout" select the "MainNavigation" layout we created to make the menu module compatible with bootstraps already built in mobile menu css.

Logo - Just place an image or some text that's linkable to your homepage into a custom html module and place it in the logo position.

Icons - If you notice, bootstrap has classes built in to use icons on text. See the original Landing Page template on StartBootstraps website for an example. It does this by means of a <i class""></i> tag where the class will correspond to a particular icon. Joomla editors though strip this tag sometimes, so if you have issues with using them, be sure to check your chosen site editor's documentation on how to prevent this.

Sidebar - You can move the sidebar to the left or right of the content area by just editting the css classes on those divs in your template.












*** Experimental idea for the future buy may not implement - Many times you'd like to set the width of modules that appear in a single row. The goal with the way module chrome styles were setup was to allow you to place into the Module Class Suffix field the class that Bootstrap uses to define layout widths based on a 12-grid. Some of them are for example ... col-lg-6, col-lg-4, col-md-6, col-md-4, so on and so forth - study up on bootstrap's css classes found above. (Bootstrap 2 used the span6, span5, classes. Bootstrap 3 upgraded their classes.)

In order to help make this possible, we had to create a custom Chrome module style called "suffixOnce". We modded the output to remove some of the extra html that joomla wraps modules in when given the "xhtml" style. However, various module types output  content that inserts the module class suffix by default around the content itself. We created a module content override for custom html modules in the template, html folder. If you attempt to use the bootstrap classes to create layouts where you're using modules other than custom html, then you might have to create an override for those modules where you remove the php echo to the module class suffix. Alternatively, you could place the Bootstrap css class for a width into the module class suffix field, but place it in the box FIRST with no spaces. This should disable the style by placing the class with no spaces along side the default class given to module on that level.
