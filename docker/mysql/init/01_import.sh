#!/bin/bash
set -e
echo "[MySQL Init] Importing dump into ${MYSQL_DATABASE}..."
mysql -u root -p"${MYSQL_ROOT_PASSWORD}" "${MYSQL_DATABASE}" < /tmp/mahjang-dump.sql
echo "[MySQL Init] Import complete."
