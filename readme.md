#RestAPI

## Testing:

To test you need:

- Clone Repository<br>
`$ git clone https://github.com/palalam/api-test.git `

- Configure database connection settings in the root directory in the .env file
- Make a transaction of tables into the database<br>
`$ php artisan migrate `
- Install CURL if not installed<br>
`$ sudo apt-get install curl `
- Test registration<br>
`$ curl -X POST http://<YOU_URL>/api/register \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d '{"name": "John", "email": "test@qwe.com", "password": "qwerty", "password_confirmation": "qwerty"}'`
- The responce should be like this:<br>
`{
     "data": {
         "api_token":"0syHnl0Y9jOIfszq11EC2CBQwCfObmvscrZYo5o2ilZPnohvndH797nDNyAT",
         "created_at": "2019-10-12 15:17:15",
         "email": "test@qwe.com",
         "id": 51,
         "name": "John",
         "updated_at": "2019-10-12 15:17:15"
     }
 }`
- A new user has been added to the user database table.

