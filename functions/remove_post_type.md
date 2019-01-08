# remove_post_type

```php
$my_addon->remove_post_type( $remove_this [array/string - the posts to remove] );
```

## Description

Hide one or more post types from the drop down list in Step 1 of an import.

## Parameters

#### $remove_this

* Array or string of the post type(s) to remove.

## Usage

### **Example 1: Remove a single post type from the drop down**

```php
$my_addon->remove_post_type( 'some_post_type' );
```

### **Example 2: Remove multiple post types at once**

```php
$my_addon->remove_post_type( array( 'a_post_type', 'another_post_type' ) );
```
