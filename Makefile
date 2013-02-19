deploy:
	@@rsync -avz ./ han:/var/www/bootstrap.braincrafted.com --exclude-from=./app/config/rsync_exclude.txt

.PHONY: deploy
