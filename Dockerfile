FROM node:lts AS builder
WORKDIR /build/
COPY . .
RUN npm i && \
    npm run build

FROM nginx
WORKDIR /app/
COPY --from=builder /build/dist /app
COPY nginx.conf /etc/nginx/nginx.conf
