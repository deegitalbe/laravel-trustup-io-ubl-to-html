#!/bin/bash
cp .env.example .env && \
docker compose build && \
./cli composer install && \
./cli bun install && \
npx lefthook install
