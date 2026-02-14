how to start

```
# git clone this repository and confirm your current directory is project root 

docker compose up -d

# generate .env file coping .env.example and modify the database connection settings
sed s/DB_CONNECTION=sqlite/#DB_CONNECTION=sqlite/g src/.env.example > src/.env

# confirm if api server runs
curl localhost:8080/api/sample

```

```
# 参考
curl "localhost:8080/api/categories?customerTypeId=2"
curl "localhost:8080/api/categories-by-customer-type?customerTypeId=2"
```
