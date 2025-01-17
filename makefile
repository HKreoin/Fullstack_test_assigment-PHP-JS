run:
	php -S localhost:8081 -t backend/public & npx serve public_html/

run-backend:
	php -S localhost:8081 -t backend/public

run-frontend:
	npx serve public_html/