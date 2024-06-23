### Update mariadb version
Mariadb version was 10.4. Upgraded to newer version with this command:\
`ddev debug migrate-database mariadb:10.6`

### Update PHP version
Just change the PHP version in the .ddev/config.yaml file.\
`php_version: "8.3"`

### Use drush
Use any drush command like this:\
`ddev drush cr`
