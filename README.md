# BDD Photographer Credit Field
All this plugin does is adds a photographer credit field to attachments that can then be used in template files.

To access the credit information, you could use php code in your template like this:

```php
$imgPhotog = get_post_meta($post->ID, 'bdd_photographer_name', true);
if ( ! empty ($imgPhotog)) {
  echo '<p><strong>Photo credit:</strong> ' . $imgPhotog . '</p>';
}
```
