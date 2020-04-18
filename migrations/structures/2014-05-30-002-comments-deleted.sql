ALTER TABLE `comments`
ADD COLUMN `deleted_at`  timestamp NULL ON UPDATE CURRENT_TIMESTAMP AFTER `created_at`;
