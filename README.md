# googledoc-backend
a php application that uses google docs as its content generator.

Originally built for AIGA/NY's [Citizen Designer Now!](http://citizendesignernow.org) initiative as a public/crowd-sourced backend.

- uses the [google rest api v3](https://developers.google.com/drive/v3/web/manage-downloads)
- composer dependencies are html-to-markdown and Parsedown

## install
- place contents into a directory of your choice
- in `build/` create a folder `docs` and create a `developerkey.txt` with your [ OAuth client ID](https://developers.google.com/drive/v3/web/quickstart/php). (final path should look like this: `build/docs/developerkey.txt`)
- assign your file ID and developer key in the index.php file and pass their values through `the_google_doc()` function.
