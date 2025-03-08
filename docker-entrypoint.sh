#!/bin/bash
set -e

# Wait for MySQL
echo "Waiting for MySQL..."
until mysql -h "db" -u "root" -p"${DB_PASS}" -e "SELECT 1;" > /dev/null 2>&1; do
  sleep 1
done

# Run migrations
echo "Running migrations..."
php migrations/001_create_users_table.php

# Run seeders (optional)
if [ "$RUN_SEEDER" = "true" ]; then
  echo "Seeding data..."
  php seeders/UserSeeder.php
fi

# Start Apache
echo "Starting Apache..."
exec apache2-foreground
