#!/bin/bash
cp .env.example .env && \
docker compose build --no-cache && \
./cli composer install && \
./cli bun install && \
npx lefthook install
