---
title: Posts from 2006
year: 2006
tags: year-page
eleventyExcludeFromCollections: ["post", "2006"]
---

![Hallway of Marchmont Road flat 2006](new_home.JPG)

This is the year we moved into our Victorian flat in Marchmont, Edinburgh.

{% for post in collections.2006 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}