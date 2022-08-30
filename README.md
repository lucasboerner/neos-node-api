# Lucas.NodeApi

---

## Node API to fetch nodes trough http requests

This package provides an API for rendering fusion nodes and fetch them.

```
http://<your-host>/api/node/render?node=/sites/neosdemo/main/node524a87808ab3e/column0/node524a8a41c2f1f

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

You can send requests in this format:

```
http://<your-host>/api/node/<action>?node=<your-node-path>
```

For <action> you can use the following options: render, renderChildren and properties. This options are explained below.
---
### Fetch a single node

This API route returns a single rendered node.

Options:

- node: the node path of the node you like to fetch

```
http://<your-host>/api/node/render?node=/sites/neosdemo/main/node524a87808ab3e/column0/node524a8a41c2f1f

{
    "node":"/sites/neosdemo/main/node524a87808ab3e/column0/node524a8a41c2f1f",
    "html":"<div><p>n</p><p>In only a few years from...</p></div>"
}
```
---
### Fetch child nodes of a node

This API route returns a single rendered node.

Options:

- node: the node path of the node you like to fetch
- offset: how many nodes should be cut away at the beginning
- length: how many nodes should be rendered

```
http://<your-host>/api/node/renderChildren?node=/sites/neosdemo/main/node524a87808ab3e/column0&offset=0&length=10

{
    "node":"/sites/neosdemo/main/node524a87808ab3e/column0",
    "children":{
        "/sites/neosdemo/main/node524a87808ab3e/column0/node526a3d67478a0":"<div><h4>Imagine this...</h4></div>",
        "/sites/neosdemo/main/node524a87808ab3e/column0/node524a8a41c2f1f":"<div><p></p><p>In only a few years from...</p></div>",
        "/sites/neosdemo/main/node524a87808ab3e/column0/node-rg13gy6gpohux":"<div><figure><img src="..." /></figure></div>"
    }
}
```
---
### Fetch properties of a node

This API route returns the properties of a node.

Options:

- node: the node path of the node you like to fetch

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

