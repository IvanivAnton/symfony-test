## API

### Goods list

`../api/v1/good` `GET` <br>
Request example: `../api/v1/good?category_id=1&manufacturer_id=1&year=2022&price_from=1000&price_to=2000` <br>
Response if all filters are correct:

```json
[
  {
    "id": 1,
    "category_id": 1,
    "manufacturer_id": 1,
    "price": 1000,
    "year": 2000,
    "name": "Galaxy Note 8T"
  }
]
```

Response if filters incorrect:

```json
{
  "message": "validation_failed",
  "errors": [
    {
      "property": "category_id",
      "value": -1,
      "message": "This value should be positive."
    },
    {
      "property": "manufacturer_id",
      "value": -1,
      "message": "This value should be positive."
    },
    {
      "property": "year",
      "value": -200,
      "message": "This value should be positive."
    },
    {
      "property": "price_from",
      "value": -1000,
      "message": "This value should be either positive or zero."
    }
  ]
}
```

### Categories list

`../api/v1/category` `GET`<br>
Response example

```json
[
  {
    "id": 1,
    "name": "Phone"
  }
]
```

### Manufacturers list

`../api/v1/manufacuter` `GET`<br>
Response example

```json
[
  {
    "id": 1,
    "name": "Samsung"
  }
]
```

### Order

#### Show

`../api/v1/order/{id}` `GET` <br>
Response example if order exists

```json
{
  "id": 1,
  "status": "Created",
  "goods": [
    {
      "id": 1,
      "categoryId": 1,
      "manufacturerId": 1,
      "price": 1000,
      "year": 2000,
      "name": "Galaxy Note 8T"
    }
  ]
}
```

Response example if order do not exist

```json
{
  "message": "No such order"
}
```

#### Create

`../api/v1/order` `POST` <br>

Body example

```json
{
  "goods": [
    1,
    2,
    3
  ]
}
```

Response empty if status code `204` <br>

Response if some goods do not exist code `422` <br>

```json
{
  "message": "Some goods do not exist"
}
```
