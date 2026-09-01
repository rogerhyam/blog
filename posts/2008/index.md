---
title: Posts from 2008
year: 2008
tags: year-page
eleventyExcludeFromCollections: ["post", "2008"]
---

![Fairy Table from 2007](images/fairy_table.jpg)

{% for post in collections.2008 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}