---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_a925a8d22b3615f12fca79456d286859 -->
## Get a JWT via given credentials.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthorized"
}
```

### HTTP Request
`POST api/auth/login`


<!-- END_a925a8d22b3615f12fca79456d286859 -->

<!-- START_19ff1b6f8ce19d3c444e9b518e8f7160 -->
## Log the user out (Invalidate the token).

> Example request:

```bash
curl -X POST \
    "http://localhost/api/auth/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/auth/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`POST api/auth/logout`


<!-- END_19ff1b6f8ce19d3c444e9b518e8f7160 -->

<!-- START_994af8f47e3039ba6d6d67c09dd9e415 -->
## Refresh a token.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/auth/refresh" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/auth/refresh"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`POST api/auth/refresh`


<!-- END_994af8f47e3039ba6d6d67c09dd9e415 -->

<!-- START_a47210337df3b4ba0df697c115ba0c1e -->
## Get the authenticated User.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/auth/me" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/auth/me"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`POST api/auth/me`


<!-- END_a47210337df3b4ba0df697c115ba0c1e -->

<!-- START_e3e761ed2b974d3eb44f8efa92e04162 -->
## Get Lottery Winners(specific/general)

> Example request:

```bash
curl -X POST \
    "http://localhost/api/admin/winners/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/admin/winners/report"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": []
}
```

### HTTP Request
`POST api/admin/winners/report`


<!-- END_e3e761ed2b974d3eb44f8efa92e04162 -->

<!-- START_a7470628b1c4e2c8d066702b4ea7969c -->
## Get latest lotteries created.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/lotteries" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/lotteries"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 44,
            "code": "IBAAyqEnKF0toKuCksuA",
            "capacity": "8799",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:13.000000Z",
            "updated_at": "2020-07-30T13:15:13.000000Z"
        },
        {
            "id": 45,
            "code": "OmV8IK5DGNOtIodVC7fa",
            "capacity": "4134",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:13.000000Z",
            "updated_at": "2020-07-30T13:15:13.000000Z"
        },
        {
            "id": 46,
            "code": "X3Q9rjQZjmelKfl3PnGu",
            "capacity": "8929",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:13.000000Z",
            "updated_at": "2020-07-30T13:15:13.000000Z"
        },
        {
            "id": 47,
            "code": "126C8FDqn1GIppbSfIcn",
            "capacity": "8745",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:13.000000Z",
            "updated_at": "2020-07-30T13:15:13.000000Z"
        },
        {
            "id": 48,
            "code": "V1TFeEkSyfuUHnlFuV1U",
            "capacity": "6624",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:13.000000Z",
            "updated_at": "2020-07-30T13:15:13.000000Z"
        },
        {
            "id": 49,
            "code": "Fslqdd8NKVlK7FI0Emg7",
            "capacity": "6121",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:13.000000Z",
            "updated_at": "2020-07-30T13:15:13.000000Z"
        },
        {
            "id": 50,
            "code": "MpDBm7KFeTWuKRnVtBCW",
            "capacity": "1237",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:13.000000Z",
            "updated_at": "2020-07-30T13:15:13.000000Z"
        },
        {
            "id": 33,
            "code": "tu3iZwph0XOkmV7ZEUl6",
            "capacity": "1354",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:12.000000Z",
            "updated_at": "2020-07-30T13:15:12.000000Z"
        },
        {
            "id": 34,
            "code": "qtPRisWKnF6GnWzLu1gv",
            "capacity": "2210",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:12.000000Z",
            "updated_at": "2020-07-30T13:15:12.000000Z"
        },
        {
            "id": 35,
            "code": "QxoB1HwiYzcg0fYgWSpB",
            "capacity": "7626",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:12.000000Z",
            "updated_at": "2020-07-30T13:15:12.000000Z"
        },
        {
            "id": 36,
            "code": "ekf13F5lpWJ3H5D49NH2",
            "capacity": "282",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:12.000000Z",
            "updated_at": "2020-07-30T13:15:12.000000Z"
        },
        {
            "id": 37,
            "code": "UKJqoN1uPjVW2uZtrwXW",
            "capacity": "2197",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:12.000000Z",
            "updated_at": "2020-07-30T13:15:12.000000Z"
        },
        {
            "id": 38,
            "code": "EzNIwRWUKjFW9AV4jSdj",
            "capacity": "156",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:12.000000Z",
            "updated_at": "2020-07-30T13:15:12.000000Z"
        },
        {
            "id": 39,
            "code": "l668raDtQuu1YLZRzDsb",
            "capacity": "300",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:12.000000Z",
            "updated_at": "2020-07-30T13:15:12.000000Z"
        },
        {
            "id": 40,
            "code": "h1EmBhwJzCG7nyruS1nC",
            "capacity": "4669",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:12.000000Z",
            "updated_at": "2020-07-30T13:15:12.000000Z"
        },
        {
            "id": 41,
            "code": "tNigFu1NGCXjAgyFiVZu",
            "capacity": "1507",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:12.000000Z",
            "updated_at": "2020-07-30T13:15:12.000000Z"
        },
        {
            "id": 42,
            "code": "qzMyhLH29BTkcPbNCkhO",
            "capacity": "97",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:12.000000Z",
            "updated_at": "2020-07-30T13:15:12.000000Z"
        },
        {
            "id": 43,
            "code": "U6ZJZ0nD8Ih9NQLNLwgF",
            "capacity": "3171",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:12.000000Z",
            "updated_at": "2020-07-30T13:15:12.000000Z"
        },
        {
            "id": 20,
            "code": "XhZ6daQg9ybVaLE0MQuN",
            "capacity": "1501",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:11.000000Z",
            "updated_at": "2020-07-30T13:15:11.000000Z"
        },
        {
            "id": 21,
            "code": "Eaatx649EsTIFePzskFg",
            "capacity": "6360",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:11.000000Z",
            "updated_at": "2020-07-30T13:15:11.000000Z"
        },
        {
            "id": 22,
            "code": "BzlM331zST56T2u7KO5j",
            "capacity": "7914",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:11.000000Z",
            "updated_at": "2020-07-30T13:15:11.000000Z"
        },
        {
            "id": 23,
            "code": "wtACCyNOOITRXFhXoy1L",
            "capacity": "7084",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:11.000000Z",
            "updated_at": "2020-07-30T13:15:11.000000Z"
        },
        {
            "id": 24,
            "code": "B2EyxifvxgQjkWJZOLco",
            "capacity": "2471",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:11.000000Z",
            "updated_at": "2020-07-30T13:15:11.000000Z"
        },
        {
            "id": 25,
            "code": "4QZuDfiFn6zUclcSe7Er",
            "capacity": "1852",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:11.000000Z",
            "updated_at": "2020-07-30T13:15:11.000000Z"
        },
        {
            "id": 26,
            "code": "wDYozAKc4vq9loci14re",
            "capacity": "3570",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:11.000000Z",
            "updated_at": "2020-07-30T13:15:11.000000Z"
        },
        {
            "id": 27,
            "code": "r8PCiDMrVacSQEscAClW",
            "capacity": "453",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:11.000000Z",
            "updated_at": "2020-07-30T13:15:11.000000Z"
        },
        {
            "id": 28,
            "code": "PrMqh4FtjJzDoTLtM2xD",
            "capacity": "3548",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:11.000000Z",
            "updated_at": "2020-07-30T13:15:11.000000Z"
        },
        {
            "id": 29,
            "code": "ETHotNVF9ZHEtXQGTc5H",
            "capacity": "6728",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:11.000000Z",
            "updated_at": "2020-07-30T13:15:11.000000Z"
        },
        {
            "id": 30,
            "code": "4j4L3fA9gY2JTa6SV95j",
            "capacity": "159",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:11.000000Z",
            "updated_at": "2020-07-30T13:15:11.000000Z"
        },
        {
            "id": 31,
            "code": "OeTu8LumAtaHa01KnioU",
            "capacity": "8034",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:11.000000Z",
            "updated_at": "2020-07-30T13:15:11.000000Z"
        },
        {
            "id": 32,
            "code": "YjJipjQ80qYTs3ECF1Ok",
            "capacity": "2089",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:11.000000Z",
            "updated_at": "2020-07-30T13:15:11.000000Z"
        },
        {
            "id": 8,
            "code": "AjzUTIbOubQJlMEq9PKN",
            "capacity": "487",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:10.000000Z",
            "updated_at": "2020-07-30T13:15:10.000000Z"
        },
        {
            "id": 9,
            "code": "OrJbpYKSBbvpC54UdSOv",
            "capacity": "4632",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:10.000000Z",
            "updated_at": "2020-07-30T13:15:10.000000Z"
        },
        {
            "id": 10,
            "code": "2iUF0SI0FupFNilQAJff",
            "capacity": "2723",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:10.000000Z",
            "updated_at": "2020-07-30T13:15:10.000000Z"
        },
        {
            "id": 11,
            "code": "TsPvGFfOqs1TRNH8e99i",
            "capacity": "4664",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:10.000000Z",
            "updated_at": "2020-07-30T13:15:10.000000Z"
        },
        {
            "id": 12,
            "code": "g13QnYjTfgBs6PV31F5L",
            "capacity": "8146",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:10.000000Z",
            "updated_at": "2020-07-30T13:15:10.000000Z"
        },
        {
            "id": 13,
            "code": "uT3D4wft2NGOX9f7cZtM",
            "capacity": "1190",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:10.000000Z",
            "updated_at": "2020-07-30T13:15:10.000000Z"
        },
        {
            "id": 14,
            "code": "oY487iCL4t4BHbYGikxv",
            "capacity": "4396",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:10.000000Z",
            "updated_at": "2020-07-30T13:15:10.000000Z"
        },
        {
            "id": 15,
            "code": "y9IyOA3QIpHBCQ4LYqIQ",
            "capacity": "6010",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:10.000000Z",
            "updated_at": "2020-07-30T13:15:10.000000Z"
        },
        {
            "id": 16,
            "code": "MhWT67vvoVDrDbUymp2Z",
            "capacity": "8784",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:10.000000Z",
            "updated_at": "2020-07-30T13:15:10.000000Z"
        },
        {
            "id": 17,
            "code": "qRHFwMWb1PG65MVPUlbz",
            "capacity": "4601",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:10.000000Z",
            "updated_at": "2020-07-30T13:15:10.000000Z"
        },
        {
            "id": 18,
            "code": "6AvHZ0BiPpXF93gmRapP",
            "capacity": "1111",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:10.000000Z",
            "updated_at": "2020-07-30T13:15:10.000000Z"
        },
        {
            "id": 19,
            "code": "eIz1kzz6kg9PT8XYwPtn",
            "capacity": "8092",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:10.000000Z",
            "updated_at": "2020-07-30T13:15:10.000000Z"
        },
        {
            "id": 1,
            "code": "NHy5seL2n3d3EuxKpmh5",
            "capacity": "2812",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:09.000000Z",
            "updated_at": "2020-07-30T13:15:09.000000Z"
        },
        {
            "id": 2,
            "code": "yWESo2JyY2HnJ0Z9JrzL",
            "capacity": "6266",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:09.000000Z",
            "updated_at": "2020-07-30T13:15:09.000000Z"
        },
        {
            "id": 3,
            "code": "FswigKyI474gnT7xtj7t",
            "capacity": "6613",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:09.000000Z",
            "updated_at": "2020-07-30T13:15:09.000000Z"
        },
        {
            "id": 4,
            "code": "VWzbX3vgwMFLOIoJOe0q",
            "capacity": "1133",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:09.000000Z",
            "updated_at": "2020-07-30T13:15:09.000000Z"
        },
        {
            "id": 5,
            "code": "vUSMmytMPC3wcJpOIqkE",
            "capacity": "5277",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:09.000000Z",
            "updated_at": "2020-07-30T13:15:09.000000Z"
        },
        {
            "id": 6,
            "code": "WxaXnYvyfJJjdr43BYHN",
            "capacity": "3922",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:09.000000Z",
            "updated_at": "2020-07-30T13:15:09.000000Z"
        },
        {
            "id": 7,
            "code": "GkfmXdsxJmhORUeKzsUh",
            "capacity": "5352",
            "stream_id": "1",
            "lottery_ends_at": "2020-07-30 14:45:09",
            "ended": "false",
            "created_at": "2020-07-30T13:15:09.000000Z",
            "updated_at": "2020-07-30T13:15:09.000000Z"
        }
    ]
}
```

### HTTP Request
`GET api/lotteries`


<!-- END_a7470628b1c4e2c8d066702b4ea7969c -->

<!-- START_efa9653692f2ae4f00928363d054eefa -->
## Create lottery

> Example request:

```bash
curl -X POST \
    "http://localhost/api/lotteries" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/lotteries"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`POST api/lotteries`


<!-- END_efa9653692f2ae4f00928363d054eefa -->

<!-- START_c37f7ed992a5116fddc66684f7f393b4 -->
## Get specific lottery by $id

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/lotteries/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/lotteries/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    "data",
    {
        "id": 1,
        "code": "NHy5seL2n3d3EuxKpmh5",
        "capacity": "2812",
        "stream_id": "1",
        "lottery_ends_at": "2020-07-30 14:45:09",
        "ended": "false",
        "created_at": "2020-07-30T13:15:09.000000Z",
        "updated_at": "2020-07-30T13:15:09.000000Z"
    }
]
```

### HTTP Request
`GET api/lotteries/{lottery}`


<!-- END_c37f7ed992a5116fddc66684f7f393b4 -->

<!-- START_d4d48a7bdb26ae982621fca3c3f38746 -->
## Update lottery

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/lotteries/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/lotteries/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "code": "NHy5seL2n3d3EuxKpmh5",
        "capacity": "2812",
        "stream_id": "1",
        "lottery_ends_at": "2020-07-30 14:45:09",
        "ended": "false",
        "created_at": "2020-07-30T13:15:09.000000Z",
        "updated_at": "2020-07-30T13:15:09.000000Z"
    }
}
```

### HTTP Request
`PUT api/lotteries/{lottery}`

`PATCH api/lotteries/{lottery}`


<!-- END_d4d48a7bdb26ae982621fca3c3f38746 -->

<!-- START_2d5d3282f6e9f65a5d5fd334fe40d6ce -->
## Remove lottery

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/lotteries/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/lotteries/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/lotteries/{lottery}`


<!-- END_2d5d3282f6e9f65a5d5fd334fe40d6ce -->

<!-- START_abb451296e8a2ba5637d0ec36abb578d -->
## api/streams
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/streams" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/streams"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Imelda Grimes",
            "starts_at": "2020-07-30 13:15:03",
            "finishes_at": "2020-07-30 14:45:03",
            "abrservice_current": "2020-07-30 13:15:09",
            "created_at": "2020-07-30T13:15:09.000000Z",
            "updated_at": "2020-07-30T13:15:09.000000Z"
        },
        {
            "id": 2,
            "name": "Abdullah DuBuque",
            "starts_at": "2020-07-30 13:15:03",
            "finishes_at": "2020-07-30 14:45:03",
            "abrservice_current": "2020-07-30 13:15:09",
            "created_at": "2020-07-30T13:15:09.000000Z",
            "updated_at": "2020-07-30T13:15:09.000000Z"
        },
        {
            "id": 3,
            "name": "Dr. Darrel Streich",
            "starts_at": "2020-07-30 13:15:03",
            "finishes_at": "2020-07-30 14:45:03",
            "abrservice_current": "2020-07-30 13:15:09",
            "created_at": "2020-07-30T13:15:09.000000Z",
            "updated_at": "2020-07-30T13:15:09.000000Z"
        },
        {
            "id": 4,
            "name": "Dr. Elliott Christiansen",
            "starts_at": "2020-07-30 13:15:03",
            "finishes_at": "2020-07-30 14:45:03",
            "abrservice_current": "2020-07-30 13:15:09",
            "created_at": "2020-07-30T13:15:09.000000Z",
            "updated_at": "2020-07-30T13:15:09.000000Z"
        },
        {
            "id": 5,
            "name": "Else Wuckert",
            "starts_at": "2020-07-30 13:15:03",
            "finishes_at": "2020-07-30 14:45:03",
            "abrservice_current": "2020-07-30 13:15:09",
            "created_at": "2020-07-30T13:15:09.000000Z",
            "updated_at": "2020-07-30T13:15:09.000000Z"
        }
    ]
}
```

### HTTP Request
`GET api/streams`


<!-- END_abb451296e8a2ba5637d0ec36abb578d -->

<!-- START_bf44ada173010e2c208afd434eaa671b -->
## Create Stream

> Example request:

```bash
curl -X POST \
    "http://localhost/api/streams" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/streams"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`POST api/streams`


<!-- END_bf44ada173010e2c208afd434eaa671b -->

<!-- START_74a8d9fa827a7a3d2dd911edb687c7cf -->
## api/streams/{stream}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/streams/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/streams/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    "data",
    {
        "id": 1,
        "name": "Imelda Grimes",
        "starts_at": "2020-07-30 13:15:03",
        "finishes_at": "2020-07-30 14:45:03",
        "abrservice_current": "2020-07-30 13:15:09",
        "created_at": "2020-07-30T13:15:09.000000Z",
        "updated_at": "2020-07-30T13:15:09.000000Z"
    }
]
```

### HTTP Request
`GET api/streams/{stream}`


<!-- END_74a8d9fa827a7a3d2dd911edb687c7cf -->

<!-- START_d0d9ff34c11558c8c22b9e8eb9692e1c -->
## api/streams/{stream}
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/streams/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/streams/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "name": "Imelda Grimes",
        "starts_at": "2020-07-30 13:15:03",
        "finishes_at": "2020-07-30 14:45:03",
        "abrservice_current": "2020-07-30 13:15:09",
        "created_at": "2020-07-30T13:15:09.000000Z",
        "updated_at": "2020-07-30T13:15:09.000000Z"
    }
}
```

### HTTP Request
`PUT api/streams/{stream}`

`PATCH api/streams/{stream}`


<!-- END_d0d9ff34c11558c8c22b9e8eb9692e1c -->

<!-- START_f4bae32ba247ae11083636bb6265e1bc -->
## api/streams/{stream}
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/streams/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/streams/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`DELETE api/streams/{stream}`


<!-- END_f4bae32ba247ae11083636bb6265e1bc -->

<!-- START_fc1e4f6a697e3c48257de845299b71d5 -->
## api/users
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 39,
            "name": "Dianna Hackett",
            "phone": "+4308861192984",
            "email": "judah.schultz@example.org"
        },
        {
            "id": 40,
            "name": "Prof. Georgette Moore",
            "phone": "+2626867090837",
            "email": "cstanton@example.org"
        },
        {
            "id": 41,
            "name": "Ramiro Yost DDS",
            "phone": "+1175408537772",
            "email": "jsmitham@example.com"
        },
        {
            "id": 42,
            "name": "Jazmyn Schumm III",
            "phone": "+1979028821735",
            "email": "mann.cassandre@example.org"
        },
        {
            "id": 43,
            "name": "Lavinia Ernser",
            "phone": "+2631199661949",
            "email": "lonie.labadie@example.com"
        },
        {
            "id": 44,
            "name": "Elaina Carter PhD",
            "phone": "+5165375339166",
            "email": "caitlyn65@example.org"
        },
        {
            "id": 45,
            "name": "Darian Nolan",
            "phone": "+6017897991834",
            "email": "zpollich@example.net"
        },
        {
            "id": 46,
            "name": "Elliott Orn",
            "phone": "+6386540192106",
            "email": "max42@example.com"
        },
        {
            "id": 47,
            "name": "Ms. Velva Rath MD",
            "phone": "+1994812028369",
            "email": "damaris.rowe@example.com"
        },
        {
            "id": 48,
            "name": "Daron Hintz",
            "phone": "+3889432919940",
            "email": "johnston.julie@example.net"
        },
        {
            "id": 49,
            "name": "Kurtis Rogahn",
            "phone": "+9898207228434",
            "email": "schuppe.rodrick@example.org"
        },
        {
            "id": 50,
            "name": "Dora Reynolds",
            "phone": "+1645894978807",
            "email": "wwyman@example.net"
        },
        {
            "id": 27,
            "name": "Tommie Vandervort",
            "phone": "+1730206201107",
            "email": "switting@example.org"
        },
        {
            "id": 28,
            "name": "Noemy Rohan",
            "phone": "+3130417699962",
            "email": "damore.tillman@example.com"
        },
        {
            "id": 29,
            "name": "Prof. Anais Rosenbaum",
            "phone": "+4833875141248",
            "email": "idickinson@example.com"
        },
        {
            "id": 30,
            "name": "Percy Reynolds",
            "phone": "+6247853325277",
            "email": "kyler01@example.net"
        },
        {
            "id": 31,
            "name": "Cloyd Doyle",
            "phone": "+1967165577639",
            "email": "vkohler@example.org"
        },
        {
            "id": 32,
            "name": "Clarissa Veum",
            "phone": "+7089401420965",
            "email": "alena79@example.org"
        },
        {
            "id": 33,
            "name": "Alia Conroy II",
            "phone": "+1938515952896",
            "email": "kovacek.gregg@example.com"
        },
        {
            "id": 34,
            "name": "Shanna Oberbrunner V",
            "phone": "+1160410818634",
            "email": "bennie.romaguera@example.com"
        },
        {
            "id": 35,
            "name": "Zack Kiehn",
            "phone": "+2927789417926",
            "email": "stiedemann.stefan@example.net"
        },
        {
            "id": 36,
            "name": "Marguerite Gulgowski DDS",
            "phone": "+4716077695606",
            "email": "tobin.hayes@example.net"
        },
        {
            "id": 37,
            "name": "Xander Goodwin",
            "phone": "+5401935739807",
            "email": "janet29@example.com"
        },
        {
            "id": 38,
            "name": "Elouise Kohler",
            "phone": "+6261751214291",
            "email": "amely55@example.org"
        },
        {
            "id": 15,
            "name": "Palma McKenzie",
            "phone": "+9506266382694",
            "email": "mharvey@example.org"
        },
        {
            "id": 16,
            "name": "Sim Murray",
            "phone": "+5902745678323",
            "email": "jmorar@example.net"
        },
        {
            "id": 17,
            "name": "Abdullah Beahan",
            "phone": "+2909811951613",
            "email": "chaya76@example.org"
        },
        {
            "id": 18,
            "name": "Lilly Collier IV",
            "phone": "+6003370470139",
            "email": "leuschke.kiara@example.org"
        },
        {
            "id": 19,
            "name": "Dr. Juana Mraz V",
            "phone": "+6513095976366",
            "email": "weber.kimberly@example.org"
        },
        {
            "id": 20,
            "name": "Nina Fahey",
            "phone": "+8965786664904",
            "email": "rbartell@example.com"
        },
        {
            "id": 21,
            "name": "Libbie Dooley II",
            "phone": "+3171754953258",
            "email": "schoen.etha@example.com"
        },
        {
            "id": 22,
            "name": "Darwin Krajcik",
            "phone": "+6160514424567",
            "email": "schultz.janiya@example.com"
        },
        {
            "id": 23,
            "name": "Prof. Parker Kutch Sr.",
            "phone": "+1501931921075",
            "email": "ana62@example.com"
        },
        {
            "id": 24,
            "name": "Dino Pouros",
            "phone": "+3896816199542",
            "email": "delbert.feeney@example.org"
        },
        {
            "id": 25,
            "name": "Misty Hauck",
            "phone": "+1630444572765",
            "email": "samanta.schulist@example.net"
        },
        {
            "id": 26,
            "name": "Laurianne Homenick",
            "phone": "+4450357840052",
            "email": "runolfsson.virginie@example.org"
        },
        {
            "id": 4,
            "name": "Mrs. Polly Barrows DVM",
            "phone": "+2681003196062",
            "email": "pamela.murray@example.com"
        },
        {
            "id": 5,
            "name": "Deshaun Schuster",
            "phone": "+7886288101125",
            "email": "doyle.marianna@example.net"
        },
        {
            "id": 6,
            "name": "Ivah Grimes DVM",
            "phone": "+6288149967119",
            "email": "faye92@example.net"
        },
        {
            "id": 7,
            "name": "Briana Lowe",
            "phone": "+5667516655255",
            "email": "arne.dicki@example.net"
        },
        {
            "id": 8,
            "name": "Woodrow Schamberger",
            "phone": "+6030677817415",
            "email": "cummerata.gregorio@example.com"
        },
        {
            "id": 9,
            "name": "Jarod Lynch",
            "phone": "+3632568110043",
            "email": "kailyn.bode@example.org"
        },
        {
            "id": 10,
            "name": "Annie Kilback Sr.",
            "phone": "+6733699232743",
            "email": "ejacobs@example.org"
        },
        {
            "id": 11,
            "name": "Lillie Bogisich",
            "phone": "+8205847277904",
            "email": "bashirian.oscar@example.net"
        },
        {
            "id": 12,
            "name": "Domenic Yundt Jr.",
            "phone": "+4829680894120",
            "email": "kovacek.casper@example.org"
        },
        {
            "id": 13,
            "name": "Armando Douglas",
            "phone": "+6881396404438",
            "email": "doyle.delaney@example.com"
        },
        {
            "id": 14,
            "name": "Miss Martina Abshire III",
            "phone": "+2093408846931",
            "email": "lyda.weber@example.org"
        },
        {
            "id": 1,
            "name": "Dr. Walker McDermott",
            "phone": "+7775296915110",
            "email": "bode.mariam@example.org"
        },
        {
            "id": 2,
            "name": "Dr. Clint Ruecker Jr.",
            "phone": "+5168111464356",
            "email": "satterfield.yesenia@example.org"
        },
        {
            "id": 3,
            "name": "Aryanna Okuneva",
            "phone": "+1138317932215",
            "email": "maureen15@example.com"
        }
    ]
}
```

### HTTP Request
`GET api/users`


<!-- END_fc1e4f6a697e3c48257de845299b71d5 -->

<!-- START_12e37982cc5398c7100e59625ebb5514 -->
## api/users
> Example request:

```bash
curl -X POST \
    "http://localhost/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`POST api/users`


<!-- END_12e37982cc5398c7100e59625ebb5514 -->

<!-- START_8653614346cb0e3d444d164579a0a0a2 -->
## api/users/{user}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    "data",
    {
        "id": 1,
        "name": "Dr. Walker McDermott",
        "phone": "+7775296915110",
        "email": "bode.mariam@example.org"
    }
]
```

### HTTP Request
`GET api/users/{user}`


<!-- END_8653614346cb0e3d444d164579a0a0a2 -->

<!-- START_48a3115be98493a3c866eb0e23347262 -->
## api/users/{user}
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "name": "Dr. Walker McDermott",
        "phone": "+7775296915110",
        "email": "bode.mariam@example.org"
    }
}
```

### HTTP Request
`PUT api/users/{user}`

`PATCH api/users/{user}`


<!-- END_48a3115be98493a3c866eb0e23347262 -->

<!-- START_d2db7a9fe3abd141d5adbc367a88e969 -->
## api/users/{user}
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/users/{user}`


<!-- END_d2db7a9fe3abd141d5adbc367a88e969 -->

<!-- START_d897428536c1f4bec8781716dfc44793 -->
## Attend in a given Lottery

> Example request:

```bash
curl -X POST \
    "http://localhost/api/lottery/attend" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/lottery/attend"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "error": "This lottery is not created yet or is not active any more."
}
```

### HTTP Request
`POST api/lottery/attend`


<!-- END_d897428536c1f4bec8781716dfc44793 -->

<!-- START_66e08d3cc8222573018fed49e121e96d -->
## Show the application&#039;s login form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET login`


<!-- END_66e08d3cc8222573018fed49e121e96d -->

<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
## Handle a login request to the application.

> Example request:

```bash
curl -X POST \
    "http://localhost/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (419):

```json
{
    "message": "CSRF token mismatch."
}
```

### HTTP Request
`POST login`


<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->

<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
## Log the user out of the application.

> Example request:

```bash
curl -X POST \
    "http://localhost/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (419):

```json
{
    "message": "CSRF token mismatch."
}
```

### HTTP Request
`POST logout`


<!-- END_e65925f23b9bc6b93d9356895f29f80c -->

<!-- START_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
## Show the application registration form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET register`


<!-- END_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->

<!-- START_d7aad7b5ac127700500280d511a3db01 -->
## Handle a registration request for the application.

> Example request:

```bash
curl -X POST \
    "http://localhost/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (419):

```json
{
    "message": "CSRF token mismatch."
}
```

### HTTP Request
`POST register`


<!-- END_d7aad7b5ac127700500280d511a3db01 -->

<!-- START_d72797bae6d0b1f3a341ebb1f8900441 -->
## Display the form to request a password reset link.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset`


<!-- END_d72797bae6d0b1f3a341ebb1f8900441 -->

<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
## Send a reset link to the given user.

> Example request:

```bash
curl -X POST \
    "http://localhost/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (419):

```json
{
    "message": "CSRF token mismatch."
}
```

### HTTP Request
`POST password/email`


<!-- END_feb40f06a93c80d742181b6ffb6b734e -->

<!-- START_e1605a6e5ceee9d1aeb7729216635fd7 -->
## Display the password reset view for the given token.

If no token is present, display the link request form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/password/reset/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/reset/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset/{token}`


<!-- END_e1605a6e5ceee9d1aeb7729216635fd7 -->

<!-- START_cafb407b7a846b31491f97719bb15aef -->
## Reset the given user&#039;s password.

> Example request:

```bash
curl -X POST \
    "http://localhost/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (419):

```json
{
    "message": "CSRF token mismatch."
}
```

### HTTP Request
`POST password/reset`


<!-- END_cafb407b7a846b31491f97719bb15aef -->

<!-- START_b77aedc454e9471a35dcb175278ec997 -->
## Display the password confirmation view.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET password/confirm`


<!-- END_b77aedc454e9471a35dcb175278ec997 -->

<!-- START_54462d3613f2262e741142161c0e6fea -->
## Confirm the given user&#039;s password.

> Example request:

```bash
curl -X POST \
    "http://localhost/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (419):

```json
{
    "message": "CSRF token mismatch."
}
```

### HTTP Request
`POST password/confirm`


<!-- END_54462d3613f2262e741142161c0e6fea -->

<!-- START_cb859c8e84c35d7133b6a6c8eac253f8 -->
## Show the application dashboard.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/home" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET home`


<!-- END_cb859c8e84c35d7133b6a6c8eac253f8 -->


