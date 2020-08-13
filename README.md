# php-demo
Simple demo for PHP.

## Setup
- Requires RHEL 8
- Run the following script to install demo. 

```bash
./env.sh
```
The script will install the following components:

- PHP runtime
- MongoDB extension and library
- A demo page will be copied to `/usr/share/nginx/html/php-demo`

## Access the Demo
Use web browser to access the page: `http://<your hostname>/php-demo/demo.php`