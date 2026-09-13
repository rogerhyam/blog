---
title: Posts from 2013
year: 2013
tags: year-page
styleClass: indexPage
eleventyExcludeFromCollections: ["post", "2013"]
---

{% for post in collections.2013 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}
