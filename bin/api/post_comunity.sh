#! /bin/bash

username=$1
password=$2
post_title=$3

domain="https://somcomunitats.coop/wp-json"
credentials='{"username":"'"$username"'","password":"'"$password"'"}'
data='{"title":"'"$post_title"'","status":"draft","odoo_company_id":5}'

session="$(curl \
    -X POST \
    -k \
    -H 'Content-Type: application/json' \
    "$domain/jwt-auth/v1/token" \
    -d "$credentials")"

token="$(echo -n $session | jq -r .token)"

curl \
    -X POST \
    -k \
    -H 'Content-Type: application/json' \
    -H "Authorization: Bearer $token" \
    $domain/wp/v2/rest_ce_community \
    -d "$data"
