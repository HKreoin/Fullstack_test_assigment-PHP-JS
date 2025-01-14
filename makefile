run:
	php -S localhost:8081 -t backend/public & npx serve frontend/public/

run-backend:
	php -S localhost:8081 -t backend/public

run-frontend:
	npx serve frontend/public