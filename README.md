# Lucas.NodeApi

---

## Node API to fetch nodes trough http requests

This package provides an API for rendering fusion nodes and fetch them.

```
http://127.0.0.1:8081/api/node/render?node=/sites/neosdemo/main/node524a87808ab3e/column0/node524a8a41c2f1f

{
    "node":"/sites/neosdemo/main/node524a87808ab3e/column0/node524a8a41c2f1f",
    "html":"<div><p>n</p><p>In only a few years from...</p></div>"
}
```

You can fetch rendered single nodes, child nodes and properties of nodes.

---

## Installation

Lucas.NodeApi is installable through packagist by running ``composer require lucas/nodeapi``.

---

## Usage

### Fetch a single node

```
http://<your-host>/api/node/render?node=/sites/neosdemo/main/node524a87808ab3e/column0/node524a8a41c2f1f

{
    "node":"/sites/neosdemo/main/node524a87808ab3e/column0/node524a8a41c2f1f",
    "html":"<div><p>n</p><p>In only a few years from...</p></div>"
}
```

### Fetch child nodes of a node

```
http://<your-host>/api/node/renderChildren?node=/sites/neosdemo/main/node524a87808ab3e/column0

{
    "node":"/sites/neosdemo/main/node524a87808ab3e/column0",
    "children":{
        "/sites/neosdemo/main/node524a87808ab3e/column0/node526a3d67478a0":"<div><h4>Imagine this...</h4></div>",
        "/sites/neosdemo/main/node524a87808ab3e/column0/node524a8a41c2f1f":"<div><p></p><p>In only a few years from...</p></div>",
        "/sites/neosdemo/main/node524a87808ab3e/column0/node-rg13gy6gpohux":"<div><figure><img src="..." /></figure></div>"
    }
}
```

### Fetch properties of a node

```
http://<your-host>/api/node/render?node=/sites/neosdemo/main/node524a87808ab3e/column0/node524a8a41c2f1f

{
    "node":"/sites/neosdemo/main/node524a87808ab3e/column0/node524a8a41c2f1f",
    "properties":{
        "text: "Hello World",
        "spacialFormatting": "true"
    }
}
```

