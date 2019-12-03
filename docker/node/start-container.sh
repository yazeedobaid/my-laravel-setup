#!/bin/sh

if [ "$NODE_ENV" = "development" ]; then
    npm install && npm run watch-poll
elif [ "$NODE_ENV" = "production" ]; then
    npm install && npm run prod
else
    exec "$@"
fi
