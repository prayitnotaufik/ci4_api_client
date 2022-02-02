# Codeigniter 4 restAPI Client
## How to run
1. Git bash here
2. composer install (wait until done)
3. "php spark serve --port 8082"
4. Enjoy

## How to fix the bug
1. Bug ini berasal dari countable pada library guzzle yg tidak bisa mengembalikan nilai null pada handlernya.
2. Maka dari itu ada beberapa kode yg harus diganti agar handler bisa mengembalikan nilai null
3. Copykan CurlFactory pada folder BugFix ke  {Directory anda}\ci4_api_client\vendor\guzzlehttp\guzzle\src\Handler
4. Paste dan Replace
