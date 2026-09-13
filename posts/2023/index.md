---
title: Posts from 2023
year: 2023
tags: year-page
styleClass: indexPage
eleventyExcludeFromCollections: ["post", "2023"]
---

{% for post in collections.2019 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}
