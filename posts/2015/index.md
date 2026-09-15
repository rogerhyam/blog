---
title: 2015
year: 2015
tags: year-page
styleClass: indexPage
eleventyExcludeFromCollections: ["post", "2015"]
---

![Shinrinyoku](images/20150808-shinrinyoku-1024x577.jpg)

{% for post in collections.2015 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}
