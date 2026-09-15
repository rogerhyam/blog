---
title: 2017
year: 2017
tags: year-page
styleClass: indexPage
eleventyExcludeFromCollections: ["post", "2017"]
---

![The little people](images/1024px-Homenzinhos_de_barro_8196334011-1024x680.jpg)

{% for post in collections.2017 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}
