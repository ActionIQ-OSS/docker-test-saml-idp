# Docker Test SAML 2.0 Identity Provider (IdP)

Forked from [kristophjunge/docker-test-saml-idp](https://github.com/kristophjunge/docker-test-saml-idp)

Docker container with a plug and play SAML 2.0 Identity Provider (IdP) for development and testing.

Built with [SimpleSAMLphp](https://simplesamlphp.org). Based on official PHP7 Apache [images](https://hub.docker.com/_/php/).

**Warning!**: Do not use this container in production! The container is not configured for security and contains static user credentials and SSL keys.

SimpleSAMLphp is logging to stdout on debug log level. Apache is logging error and access log to stdout.

The contained version of SimpleSAMLphp is 1.15.2.

## Usage

```
docker run --name=test-saml-idp \
-p 8080:8080 \
-p 8443:8443 \
-e SIMPLESAMLPHP_SP_ENTITY_ID=ENTITY_ID \
-e SIMPLESAMLPHP_SP_ASSERTION_CONSUMER_SERVICE=ACS \
-d actioniq/test-saml-idp
```

`ENTITY_ID` and `ACS` should both be the full URL of the IdP instance, eg `http://localhost:9000/sso/test_customer`

There are two static users configured in the IdP with the following data:

| Username | Password | Email |
|---|---|---|---|
| user1 | user1pass | user1@example.com |
| user2 | user2pass | user2@example.com |

However, you can define your own users by mounting a configuration file:

```
-v /users.php:/var/www/simplesamlphp/config/authsources.php
```

You can access the SimpleSAMLphp web interface of the IdP under `http://localhost:8080/simplesaml`. The admin password is `secret`.

To use this for IdP-initiated requests, navigate to:
```
http://localhost:8080/simplesaml/saml2/idp/SSOService.php?spentityid=ENTITY_ID
```

## Build and Push

```
> tag=$(git log -1 --format=%h)
> docker build -t actioniq/test-saml-idp .
> docker build -t "actioniq/test-saml-idp:$tag" .
> docker push actioniq/test-saml-idp
```

## License

This project is licensed under the MIT license by Kristoph Junge.
