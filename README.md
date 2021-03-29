# CMS

## TODOs

- [x]  dockerize the project with docker compose and make file
    - use fpm
    - access to NGINX log
    - use php 8
    - add possibility for customizing php extensions
    - add possibility for customizing php.ini file
    - use PostgreSQL
    - use Makefile
    - setting db username and password secured
    - tune fpm
- [ ]  create category and post entity with minimum properties
    - use make bundle
- [ ]  create crud api controllers and forms for category and post
    - use API Platform
    - Restful best practices
    - best practices for folder structures
    - best practices for versioning
    - use open api annotation
    - use validations
    - use DTO
    - use serializer
    - use soft delete
    - use pagination
    - use filter
- [ ]  add image to post
- [ ]  secure crud controllers with authentication and permissions
- [ ]  add reusable tagging to post
- [ ]  add mechanism for following category and triggering event when post created and sending notifications (email, sms and if possible push message) asynchronously to users
- [ ]  log exceptions in notification sending with special channel and in file
    - try to use different handlers
- [ ]  use Redis for session management
- [ ]  use GraphQL
- [ ]  asynchronously index posts in ElasticSearch
- [ ]  use ElasticSearch for frontend api's
    - add full text search
