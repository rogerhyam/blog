---
title: 2018
year: 2018
tags: year-page
styleClass: indexPage
eleventyExcludeFromCollections: ["post", "2018"]
---

![Snow on the Meadows](images/DSCF7433-1024x683.jpg)

Will this be the last significant snow?

{% for post in collections.2018 %}
- [{{post.data.title}}]({{post.url}})
{% endfor %}
