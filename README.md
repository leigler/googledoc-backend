# googledoc-backend
a php application that uses google docs as its content generator.

Originally built for AIGA/NY's [Citizen Designer Now!](http://citizendesignernow.org) initiative as a public/crowd-sourced backend.

- uses the [google rest api v3](https://developers.google.com/drive/v3/web/manage-downloads)
- composer dependencies are html-to-markdown and Parsedown

## install
- place contents into a directory of your choice
- in `build/` create a folder `docs` and create a `developerkey.txt` with your [ OAuth client ID](https://developers.google.com/drive/v3/web/quickstart/php). (final path should look like this: `build/docs/developerkey.txt`)
- on line 23 of index.php, swap out the current string with the doc string ID of your choice (it's in the URL between `documents/d/________________________/edit`). (make sure your google doc is set to "Public on the Web" under sharing conditions)
