---
title: 2016
year: 2016
tags: year-page
styleClass: indexPage
eleventyExcludeFromCollections: ["post", "2016"]
---

![Henry signing for is fans](images/20160812-DSCF5371-Edit-1024x683.jpg)

{% for post in collections.2016 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}
