PHP-Application-Cache-Generator
===============================

PHP to generate an application cache file based on site files MD5 hash

Allows the application cache to be updated automatically if any files in the current directory are edited.
If no files have been changed then the manifest generates and identical copy, thus not changing and causing the 'noupdate' event to occur.

Currently this only works if placed in the root directory of your site, and will only generate for files in that directory (no subdirectories).
