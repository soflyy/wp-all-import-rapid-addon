# move_post_type

```php
$my_addon->move_post_type( $move_this [array/string - the posts to move], $move_to [array/string - position to move the post(s) to] );
```

## Description

Move one or more post types in the drop down list on Step 1 of an import.

## Parameters

#### $move_this

* Array or string of the post(s) to move.

#### $move_to

* Array or string of the new position(s) for the post(s).

## Usage

### **Example 1: Move WooCommerce Products post type to the top of the list**

```php
$my_addon->move_post_type( 'product', 0 );
```

### **Example 2: Move 3 different post types to the top 3 positions in the list**

```php
$my_addon->move_post_type( array( 'post', 'page', 'product' ), array( 0, 1, 2 ) );
```


### **Example 3: Move 3 different posts to the end of the list**

```php
$my_addon->move_post_type( array( 'post', 'page', 'product' ), array( 99, 99, 99 ) );
```
