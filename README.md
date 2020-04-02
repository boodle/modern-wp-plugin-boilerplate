# What is it?

An blank boilerplate plugin, structured a bit more like a big-boy project; namespaces, autoloader, a (basic) renderer, Exceptions.

Ready for composer, and with webpack added in and configured to generate separate js & css for the frontend and admin areas.

An example shortcode, and `wp-json` endpoint have been added.

# Getting it ready to run

1. Clone into your `wp-content/plugins/` folder
2. Run `composer install`
3. Run `npm install`
4. Build the frontend bits with `npx webpack`