# LA Trash Day Transfer

A phone script that looks up the scheduled trash day of a caller - based on caller ID - and prompts them if within 2 days to remind them to take out their trash.

The approach shown in this script is meant to be used in conjuntion with municipal customer service lines (e.g. 311). This functionality could be used as part of the on hold message for callers as they wait in queue for an agent.

## How it works

Built with:

* [Tropo](https://www.tropo.com/) cloud telephony platform.
* White Pages Pro [Reverse Phone Lookup API](http://pro.whitepages.com/developer/documentation/reverse-phone-api/) (API Key required).
* ArcGIS Service from LA GeoHub for [Solids Collection Service District Days](http://geohub.lacity.org/datasets/803ee5b68546441681922ab5a5a7e1c1_22).

This example is tailored for the City of Los Angeles, but could be easily ported to another city with a [similar trash pickup API](https://alpha.phila.gov/trashday/).

This example focuses on trash pick up days, but this same approach could be used for all kinds of city services that have a location or time component - property tax remittance, alternate side street parking, scheduled street closures, etc.

This is also one example of the [approach of "cross-selling" public services](http://techpresident.com/news/25354/pdf-italia-tom-steinberg-explored-5-digital-asks-we-should-make-our-government). When a user engages with government on one service, provide contextualized information on that channel to them for other services that they might use or take advantage of.