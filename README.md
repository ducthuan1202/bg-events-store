## About Laravel

```bash

# build containers
docker-compose up -d --build

# run after build
docker-compose up -d

# import db
docker exec -i <container_id> mysql -uroot -hmy_sql -proot@123 bg_event_store < docker/db_example.sql

# login to mysql
docker exec -it <container_id> mysql -uroot -hmy_sql -proot@123

```
