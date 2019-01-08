# set_post_type_image

```php
$my_addon->set_post_type_image( $post_type [string - the post type slug], $image = [string - the dashicon slug], $class = [string - the css class for the dashicon] );
```

## Description

Set the dashicon that will be used in the WPAI drop down list.

## Parameters

#### $post_type

* String: the post type slug.

#### $image

* String: the dashicon slug. Example "dashicons-my-custom-icon".

#### $class

* String: the CSS class for your dashicon.

## Usage

### **Example 1: Custom icon**

1. Save your custom images inside the 'fonts' folder for your plugin.

2. Add the necessary CSS rules inside your CSS file in the "css" folder for your plugin, e.g.:

```css
@font-face {
    font-family: 'my first addon';
    src: url('../fonts/my-first-addon.eot');
    src: url('../fonts/my-first-addon.eot?#iefix') format('embedded-opentype'),
         url('../fonts/my-first-addon.woff') format('woff'),
         url('../fonts/my-first-addon.ttf') format('truetype'),
         url('../fonts/my-first-addon.svg#my-first-addon') format('svg');
    font-weight: normal;
    font-style: normal;
}
[class*='dashicons-envelope-custom-icon']:before{
	display: inline-block;
   font-family: 'my first addon';
   font-style: normal;
   font-weight: normal;
   line-height: 1;
   -webkit-font-smoothing: antialiased;
   -moz-osx-font-smoothing: grayscale
}
.dashicons-envelope-custom-icon:before{content:'\0041';}
```

3. In your plugin PHP file, register and enqueue the CSS file:

```php
function my_first_addon_styles() {
    wp_register_style( 'my_first_addon', plugins_url( 'css/my-first-addon.css', __FILE__ ) );
    wp_enqueue_style( 'my_first_addon' );
}

add_action( 'admin_init', 'my_first_addon_styles' );
```

4. Set the icon using our new set_post_type_image function:

```php
$my_addon->set_post_type_image( 'soflyy_posts', 'dashicons-envelope-custom-icon', 'dashicons-envelope-custom-icon' );
```

### Example 2: Using built in dashicons.

1. Save the CSS rule for the dashicon in your CSS file:

```css
.my-first-addon-dashicon:before {
    font-family: 'dashicons';
    content: "\f515";
}
```

2. Register and enqueue the CSS file in your main plugin PHP file:

```php
function my_first_addon_styles() {
    wp_register_style( 'my_first_addon', plugins_url( 'css/my-first-addon.css', __FILE__ ) );
    wp_enqueue_style( 'my_first_addon' );
}

add_action( 'admin_init', 'my_first_addon_styles' );
```

3. Add the icon via our new set_post_type_image function:

```php
$my_addon->set_post_type_image( 'soflyy_posts', 'dashicons-controls-repeat', 'my-first-addon-dashicon' );
```

### Example 3: Changing icons for multiple posts

1. Complete all of the CSS instructions from example 1 and/or 2 so that your dashicons are available.

2. Use arrays to define the images:

```php
$my_addon->set_post_type_image( array( 'post', 'page', 'soflyy_posts' ), array( 'dashicons-controls-repeat', 'dashicons-controls-repeat', 'dashicons-controls-repeat' ), array( 'my-first-addon-dashicon', 'my-first-addon-dashicon', 'my-first-addon-dashicon' ) );
```

### Image example

![soflyyposts](https://user-images.githubusercontent.com/1909875/44734096-1ef65f80-aab7-11e8-9082-d5e495b7866a.png)
