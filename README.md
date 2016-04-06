# LA Trash Day Transfer

A phone script that looks up the shceduled trash day of a caller - based on caller ID - and prompts them if within 2 days to remind them to take out their trash.

The approach shown in this script is meant to be used in conjuntion with municipal customer serivce lines (e.g. 311). This functionaluty could be used as part of the on hold message for callers as they wait in queue for an agent.

## How it works

Built with:

* [Tropo](https://www.tropo.com/) cloud telephony platform.
* White Pages Pro [Reverse Phone Lookup API](Reverse Phone API) (API Key required).
* ArcGIS Service from LA GeoHub for [Solids Collection Service District Days](http://geohub.lacity.org/datasets/803ee5b68546441681922ab5a5a7e1c1_22).

This example is tailored for the City of Los Angeles, but could be easily ported to another city with a similar trash pickup API.