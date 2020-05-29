<?php
!defined('MEMBER_IS_AUTH') && define('MEMBER_IS_AUTH', false);
define('FILE_X509_VALIDATE_SIGNATURE_BY_CA', 1);
define('FILE_X509_DN_ARRAY', 0);
define('FILE_X509_DN_STRING', 1);
define('FILE_X509_DN_ASN1', 2);
define('FILE_X509_DN_OPENSSL', 3);
define('FILE_X509_DN_CANON', 4);
define('FILE_X509_DN_HASH', 5);
define('FILE_X509_FORMAT_PEM', 0);
define('FILE_X509_FORMAT_DER', 1);
define('FILE_X509_FORMAT_SPKAC', 2);
define('FILE_X509_FORMAT_AUTO_DETECT', 3);
define('FILE_X509_ATTR_ALL', -1); // All attribute values (array).
define('FILE_X509_ATTR_APPEND', -2); // Add a value.
define('FILE_X509_ATTR_REPLACE', -3); // Clear first, then add a value.
define('CRYPT_MODE_CTR', -1);
define('CRYPT_MODE_ECB', 1);

/**
 * Encrypt / decrypt using the Code Book Chaining mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Cipher-block_chaining_.28CBC.29
 */
define('CRYPT_MODE_CBC', 2);
/**
 * Encrypt / decrypt using the Cipher Feedback mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Cipher_feedback_.28CFB.29
 */
define('CRYPT_MODE_CFB', 3);
/**
 * Encrypt / decrypt using the Output Feedback mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Output_feedback_.28OFB.29
 */
define('CRYPT_MODE_OFB', 4);
/**
 * Encrypt / decrypt using streaming mode.
 */
define('CRYPT_MODE_STREAM', 5);
/**#@-*/

/**#@+
 * Reduction constants
 *
 * @access private
 * @see self::_reduce()
 */
/**
 * @see self::_montgomery()
 * @see self::_prepMontgomery()
 */
define('MATH_BIGINTEGER_MONTGOMERY', 0);
/**
 * @see self::_barrett()
 */
define('MATH_BIGINTEGER_BARRETT', 1);
/**
 * @see self::_mod2()
 */
define('MATH_BIGINTEGER_POWEROF2', 2);
/**
 * @see self::_remainder()
 */
define('MATH_BIGINTEGER_CLASSIC', 3);
/**
 * @see self::__clone()
 */
define('MATH_BIGINTEGER_NONE', 4);
/**#@-*/

/**#@+
 * Array constants
 *
 * Rather than create a thousands and thousands of new Math_BigInteger objects in repeated function calls to add() and
 * multiply() or whatever, we'll just work directly on arrays, taking them in as parameters and returning them.
 *
 * @access private
 */
/**
 * $result[MATH_BIGINTEGER_VALUE] contains the value.
 */
define('MATH_BIGINTEGER_VALUE', 0);
/**
 * $result[MATH_BIGINTEGER_SIGN] contains the sign.
 */
define('MATH_BIGINTEGER_SIGN', 1);
/**#@-*/

/**#@+
 * @access private
 * @see self::_montgomery()
 * @see self::_barrett()
 */
/**
 * Cache constants
 *
 * $cache[MATH_BIGINTEGER_VARIABLE] tells us whether or not the cached data is still valid.
 */
define('MATH_BIGINTEGER_VARIABLE', 0);
/**
 * $cache[MATH_BIGINTEGER_DATA] contains the cached data.
 */
define('MATH_BIGINTEGER_DATA', 1);
/**#@-*/

/**#@+
 * Mode constants.
 *
 * @access private
 * @see self::Math_BigInteger()
 */
/**
 * To use the pure-PHP implementation
 */
define('MATH_BIGINTEGER_MODE_INTERNAL', 1);
/**
 * To use the BCMath library
 *
 * (if enabled; otherwise, the internal implementation will be used)
 */
define('MATH_BIGINTEGER_MODE_BCMATH', 2);
/**
 * To use the GMP library
 *
 * (if present; otherwise, either the BCMath or the internal implementation will be used)
 */
define('MATH_BIGINTEGER_MODE_GMP', 3);
/**#@-*/

/**
 * Karatsuba Cutoff
 *
 * At what point do we switch between Karatsuba multiplication and schoolbook long multiplication?
 *
 * @access private
 */
define('MATH_BIGINTEGER_KARATSUBA_CUTOFF', 25);


/**#@+
 * Tag Classes
 *
 * @access private
 * @link http://www.itu.int/ITU-T/studygroups/com17/languages/X.690-0207.pdf#page=12
 */
define('FILE_ASN1_CLASS_UNIVERSAL', 0);
define('FILE_ASN1_CLASS_APPLICATION', 1);
define('FILE_ASN1_CLASS_CONTEXT_SPECIFIC', 2);
define('FILE_ASN1_CLASS_PRIVATE', 3);
/**#@-*/

/**#@+
 * Tag Classes
 *
 * @access private
 * @link http://www.obj-sys.com/asn1tutorial/node124.html
 */
define('FILE_ASN1_TYPE_BOOLEAN', 1);
define('FILE_ASN1_TYPE_INTEGER', 2);
define('FILE_ASN1_TYPE_BIT_STRING', 3);
define('FILE_ASN1_TYPE_OCTET_STRING', 4);
define('FILE_ASN1_TYPE_NULL', 5);
define('FILE_ASN1_TYPE_OBJECT_IDENTIFIER', 6);
//define('FILE_ASN1_TYPE_OBJECT_DESCRIPTOR', 7);
//define('FILE_ASN1_TYPE_INSTANCE_OF',       8); // EXTERNAL
define('FILE_ASN1_TYPE_REAL', 9);
define('FILE_ASN1_TYPE_ENUMERATED', 10);
//define('FILE_ASN1_TYPE_EMBEDDED',         11);
define('FILE_ASN1_TYPE_UTF8_STRING', 12);
//define('FILE_ASN1_TYPE_RELATIVE_OID',     13);
define('FILE_ASN1_TYPE_SEQUENCE', 16); // SEQUENCE OF
define('FILE_ASN1_TYPE_SET', 17); // SET OF
/**#@-*/
/**#@+
 * More Tag Classes
 *
 * @access private
 * @link http://www.obj-sys.com/asn1tutorial/node10.html
 */
define('FILE_ASN1_TYPE_NUMERIC_STRING', 18);
define('FILE_ASN1_TYPE_PRINTABLE_STRING', 19);
define('FILE_ASN1_TYPE_TELETEX_STRING', 20); // T61String
define('FILE_ASN1_TYPE_VIDEOTEX_STRING', 21);
define('FILE_ASN1_TYPE_IA5_STRING', 22);
define('FILE_ASN1_TYPE_UTC_TIME', 23);
define('FILE_ASN1_TYPE_GENERALIZED_TIME', 24);
define('FILE_ASN1_TYPE_GRAPHIC_STRING', 25);
define('FILE_ASN1_TYPE_VISIBLE_STRING', 26); // ISO646String
define('FILE_ASN1_TYPE_GENERAL_STRING', 27);
define('FILE_ASN1_TYPE_UNIVERSAL_STRING', 28);
//define('FILE_ASN1_TYPE_CHARACTER_STRING', 29);
define('FILE_ASN1_TYPE_BMP_STRING', 30);
/**#@-*/

/**#@+
 * Tag Aliases
 *
 * These tags are kinda place holders for other tags.
 *
 * @access private
 */
define('FILE_ASN1_TYPE_CHOICE', -1);
define('FILE_ASN1_TYPE_ANY', -2);
/**#@-*/

/**#@+
 * @access public
 * @see self::encrypt()
 * @see self::decrypt()
 */
/**
 * Encrypt / decrypt using the Counter mode.
 *
 * Set to -1 since that's what Crypt/Random.php uses to index the CTR mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Counter_.28CTR.29
 */
define('CRYPT_AES_MODE_CTR', CRYPT_MODE_CTR);
/**
 * Encrypt / decrypt using the Electronic Code Book mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Electronic_codebook_.28ECB.29
 */
define('CRYPT_AES_MODE_ECB', CRYPT_MODE_ECB);
/**
 * Encrypt / decrypt using the Code Book Chaining mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Cipher-block_chaining_.28CBC.29
 */
define('CRYPT_AES_MODE_CBC', CRYPT_MODE_CBC);
/**
 * Encrypt / decrypt using the Cipher Feedback mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Cipher_feedback_.28CFB.29
 */
define('CRYPT_AES_MODE_CFB', CRYPT_MODE_CFB);
/**
 * Encrypt / decrypt using the Cipher Feedback mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Output_feedback_.28OFB.29
 */
define('CRYPT_AES_MODE_OFB', CRYPT_MODE_OFB);

/**#@+
 * @access public
 * @see self::encrypt()
 * @see self::decrypt()
 */

/**#@+
 * @access private
 * @see self::Crypt_Base()
 * @internal These constants are for internal use only
 */
/**
 * Base value for the internal implementation $engine switch
 */
define('CRYPT_ENGINE_INTERNAL', 1);
/**
 * Base value for the mcrypt implementation $engine switch
 */
define('CRYPT_ENGINE_MCRYPT', 2);
/**
 * Base value for the OpenSSL implementation $engine switch
 */
define('CRYPT_ENGINE_OPENSSL', 3);
/**#@-*/

/**#@+
 * @access public
 * @see self::encrypt()
 * @see self::decrypt()
 */
/**
 * Encrypt / decrypt using the Counter mode.
 *
 * Set to -1 since that's what Crypt/Random.php uses to index the CTR mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Counter_.28CTR.29
 */
define('CRYPT_BLOWFISH_MODE_CTR', CRYPT_MODE_CTR);
/**
 * Encrypt / decrypt using the Electronic Code Book mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Electronic_codebook_.28ECB.29
 */
define('CRYPT_BLOWFISH_MODE_ECB', CRYPT_MODE_ECB);
/**
 * Encrypt / decrypt using the Code Book Chaining mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Cipher-block_chaining_.28CBC.29
 */
define('CRYPT_BLOWFISH_MODE_CBC', CRYPT_MODE_CBC);
/**
 * Encrypt / decrypt using the Cipher Feedback mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Cipher_feedback_.28CFB.29
 */
define('CRYPT_BLOWFISH_MODE_CFB', CRYPT_MODE_CFB);
/**
 * Encrypt / decrypt using the Cipher Feedback mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Output_feedback_.28OFB.29
 */
define('CRYPT_BLOWFISH_MODE_OFB', CRYPT_MODE_OFB);
/**#@-*/

/**#@+
 * @access private
 * @see self::_setupKey()
 * @see self::_processBlock()
 */
/**
 * Contains $keys[CRYPT_DES_ENCRYPT]
 */
define('CRYPT_DES_ENCRYPT', 0);
/**
 * Contains $keys[CRYPT_DES_DECRYPT]
 */
define('CRYPT_DES_DECRYPT', 1);
/**#@-*/

/**#@+
 * @access public
 * @see self::encrypt()
 * @see self::decrypt()
 */
/**
 * Encrypt / decrypt using the Counter mode.
 *
 * Set to -1 since that's what Crypt/Random.php uses to index the CTR mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Counter_.28CTR.29
 */
define('CRYPT_DES_MODE_CTR', CRYPT_MODE_CTR);
/**
 * Encrypt / decrypt using the Electronic Code Book mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Electronic_codebook_.28ECB.29
 */
define('CRYPT_DES_MODE_ECB', CRYPT_MODE_ECB);
/**
 * Encrypt / decrypt using the Code Book Chaining mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Cipher-block_chaining_.28CBC.29
 */
define('CRYPT_DES_MODE_CBC', CRYPT_MODE_CBC);
/**
 * Encrypt / decrypt using the Cipher Feedback mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Cipher_feedback_.28CFB.29
 */
define('CRYPT_DES_MODE_CFB', CRYPT_MODE_CFB);
/**
 * Encrypt / decrypt using the Cipher Feedback mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Output_feedback_.28OFB.29
 */
define('CRYPT_DES_MODE_OFB', CRYPT_MODE_OFB);
/**#@-*/

/**#@+
 * @access private
 * @see self::Crypt_Hash()
 */
/**
 * Toggles the internal implementation
 */
define('CRYPT_HASH_MODE_INTERNAL', 1);
/**
 * Toggles the mhash() implementation, which has been deprecated on PHP 5.3.0+.
 */
define('CRYPT_HASH_MODE_MHASH', 2);
/**
 * Toggles the hash() implementation, which works on PHP 5.1.2+.
 */
define('CRYPT_HASH_MODE_HASH', 3);
/**#@-*/
/**#@+
 * @access public
 * @see self::encrypt()
 * @see self::decrypt()
 */
/**
 * Encrypt / decrypt using the Counter mode.
 *
 * Set to -1 since that's what Crypt/Random.php uses to index the CTR mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Counter_.28CTR.29
 */
define('CRYPT_RC2_MODE_CTR', CRYPT_MODE_CTR);
/**
 * Encrypt / decrypt using the Electronic Code Book mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Electronic_codebook_.28ECB.29
 */
define('CRYPT_RC2_MODE_ECB', CRYPT_MODE_ECB);
/**
 * Encrypt / decrypt using the Code Book Chaining mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Cipher-block_chaining_.28CBC.29
 */
define('CRYPT_RC2_MODE_CBC', CRYPT_MODE_CBC);
/**
 * Encrypt / decrypt using the Cipher Feedback mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Cipher_feedback_.28CFB.29
 */
define('CRYPT_RC2_MODE_CFB', CRYPT_MODE_CFB);
/**
 * Encrypt / decrypt using the Cipher Feedback mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Output_feedback_.28OFB.29
 */
define('CRYPT_RC2_MODE_OFB', CRYPT_MODE_OFB);
/**#@-*/
/**#@+
 * @access private
 * @see self::_crypt()
 */
define('CRYPT_RC4_ENCRYPT', 0);
define('CRYPT_RC4_DECRYPT', 1);
/**#@-*/
/**#@+
 * @access public
 * @see self::encrypt()
 * @see self::decrypt()
 */
/**
 * Encrypt / decrypt using the Counter mode.
 *
 * Set to -1 since that's what Crypt/Random.php uses to index the CTR mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Counter_.28CTR.29
 */
define('CRYPT_RIJNDAEL_MODE_CTR', CRYPT_MODE_CTR);
/**
 * Encrypt / decrypt using the Electronic Code Book mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Electronic_codebook_.28ECB.29
 */
define('CRYPT_RIJNDAEL_MODE_ECB', CRYPT_MODE_ECB);
/**
 * Encrypt / decrypt using the Code Book Chaining mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Cipher-block_chaining_.28CBC.29
 */
define('CRYPT_RIJNDAEL_MODE_CBC', CRYPT_MODE_CBC);
/**
 * Encrypt / decrypt using the Cipher Feedback mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Cipher_feedback_.28CFB.29
 */
define('CRYPT_RIJNDAEL_MODE_CFB', CRYPT_MODE_CFB);
/**
 * Encrypt / decrypt using the Cipher Feedback mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Output_feedback_.28OFB.29
 */
define('CRYPT_RIJNDAEL_MODE_OFB', CRYPT_MODE_OFB);
/**#@-*/
/**
 * Use {@link http://en.wikipedia.org/wiki/Optimal_Asymmetric_Encryption_Padding Optimal Asymmetric Encryption Padding}
 * (OAEP) for encryption / decryption.
 *
 * Uses sha1 by default.
 *
 * @see self::setHash()
 * @see self::setMGFHash()
 */
define('CRYPT_RSA_ENCRYPTION_OAEP', 1);
/**
 * Use PKCS#1 padding.
 *
 * Although CRYPT_RSA_ENCRYPTION_OAEP offers more security, including PKCS#1 padding is necessary for purposes of backwards
 * compatibility with protocols (like SSH-1) written before OAEP's introduction.
 */
define('CRYPT_RSA_ENCRYPTION_PKCS1', 2);
/**
 * Do not use any padding
 *
 * Although this method is not recommended it can none-the-less sometimes be useful if you're trying to decrypt some legacy
 * stuff, if you're trying to diagnose why an encrypted message isn't decrypting, etc.
 */
define('CRYPT_RSA_ENCRYPTION_NONE', 3);
/**#@-*/

/**#@+
 * @access public
 * @see self::sign()
 * @see self::verify()
 * @see self::setHash()
 */
/**
 * Use the Probabilistic Signature Scheme for signing
 *
 * Uses sha1 by default.
 *
 * @see self::setSaltLength()
 * @see self::setMGFHash()
 */
define('CRYPT_RSA_SIGNATURE_PSS', 1);
/**
 * Use the PKCS#1 scheme by default.
 *
 * Although CRYPT_RSA_SIGNATURE_PSS offers more security, including PKCS#1 signing is necessary for purposes of backwards
 * compatibility with protocols (like SSH-2) written before PSS's introduction.
 */
define('CRYPT_RSA_SIGNATURE_PKCS1', 2);
/**#@-*/

/**#@+
 * @access private
 * @see self::createKey()
 */
/**
 * ASN1 Integer
 */
define('CRYPT_RSA_ASN1_INTEGER', 2);
/**
 * ASN1 Bit String
 */
define('CRYPT_RSA_ASN1_BITSTRING', 3);
/**
 * ASN1 Octet String
 */
define('CRYPT_RSA_ASN1_OCTETSTRING', 4);
/**
 * ASN1 Object Identifier
 */
define('CRYPT_RSA_ASN1_OBJECT', 6);
/**
 * ASN1 Sequence (with the constucted bit set)
 */
define('CRYPT_RSA_ASN1_SEQUENCE', 48);
/**#@-*/

/**#@+
 * @access private
 * @see self::Crypt_RSA()
 */
/**
 * To use the pure-PHP implementation
 */
define('CRYPT_RSA_MODE_INTERNAL', 1);
/**
 * To use the OpenSSL library
 *
 * (if enabled; otherwise, the internal implementation will be used)
 */
define('CRYPT_RSA_MODE_OPENSSL', 2);
/**#@-*/

/**
 * Default openSSL configuration file.
 */
define('CRYPT_RSA_OPENSSL_CONFIG', realpath('./').'/config/openssl.cnf');

/**#@+
 * @access public
 * @see self::createKey()
 * @see self::setPrivateKeyFormat()
 */
/**
 * PKCS#1 formatted private key
 *
 * Used by OpenSSH
 */
define('CRYPT_RSA_PRIVATE_FORMAT_PKCS1', 0);
/**
 * PuTTY formatted private key
 */
define('CRYPT_RSA_PRIVATE_FORMAT_PUTTY', 1);
/**
 * XML formatted private key
 */
define('CRYPT_RSA_PRIVATE_FORMAT_XML', 2);
/**
 * PKCS#8 formatted private key
 */
define('CRYPT_RSA_PRIVATE_FORMAT_PKCS8', 8);
/**#@-*/

/**#@+
 * @access public
 * @see self::createKey()
 * @see self::setPublicKeyFormat()
 */
/**
 * Raw public key
 *
 * An array containing two Math_BigInteger objects.
 *
 * The exponent can be indexed with any of the following:
 *
 * 0, e, exponent, publicExponent
 *
 * The modulus can be indexed with any of the following:
 *
 * 1, n, modulo, modulus
 */
define('CRYPT_RSA_PUBLIC_FORMAT_RAW', 3);
/**
 * PKCS#1 formatted public key (raw)
 *
 * Used by File/X509.php
 *
 * Has the following header:
 *
 * -----BEGIN RSA PUBLIC KEY-----
 *
 * Analogous to ssh-keygen's pem format (as specified by -m)
 */
define('CRYPT_RSA_PUBLIC_FORMAT_PKCS1', 4);
define('CRYPT_RSA_PUBLIC_FORMAT_PKCS1_RAW', 4);
/**
 * XML formatted public key
 */
define('CRYPT_RSA_PUBLIC_FORMAT_XML', 5);
/**
 * OpenSSH formatted public key
 *
 * Place in $HOME/.ssh/authorized_keys
 */
define('CRYPT_RSA_PUBLIC_FORMAT_OPENSSH', 6);
/**
 * PKCS#1 formatted public key (encapsulated)
 *
 * Used by PHP's openssl_public_encrypt() and openssl's rsautl (when -pubin is set)
 *
 * Has the following header:
 *
 * -----BEGIN PUBLIC KEY-----
 *
 * Analogous to ssh-keygen's pkcs8 format (as specified by -m). Although PKCS8
 * is specific to private keys it's basically creating a DER-encoded wrapper
 * for keys. This just extends that same concept to public keys (much like ssh-keygen)
 */
define('CRYPT_RSA_PUBLIC_FORMAT_PKCS8', 7);
/**#@-*/
/**
 * Encrypt / decrypt using inner chaining
 *
 * Inner chaining is used by SSH-1 and is generally considered to be less secure then outer chaining (CRYPT_DES_MODE_CBC3).
 */
define('CRYPT_MODE_3CBC', -2);
/**
 * BC version of the above.
 */
define('CRYPT_DES_MODE_3CBC', -2);
/**
 * Encrypt / decrypt using outer chaining
 *
 * Outer chaining is used by SSH-2 and when the mode is set to CRYPT_DES_MODE_CBC.
 */
define('CRYPT_MODE_CBC3', CRYPT_MODE_CBC);
/**
 * BC version of the above.
 */
define('CRYPT_DES_MODE_CBC3', CRYPT_MODE_CBC3);
/**#@-*/
/**
 * Encrypt / decrypt using the Counter mode.
 *
 * Set to -1 since that's what Crypt/Random.php uses to index the CTR mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Counter_.28CTR.29
 */
define('CRYPT_TWOFISH_MODE_CTR', CRYPT_MODE_CTR);
/**
 * Encrypt / decrypt using the Electronic Code Book mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Electronic_codebook_.28ECB.29
 */
define('CRYPT_TWOFISH_MODE_ECB', CRYPT_MODE_ECB);
/**
 * Encrypt / decrypt using the Code Book Chaining mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Cipher-block_chaining_.28CBC.29
 */
define('CRYPT_TWOFISH_MODE_CBC', CRYPT_MODE_CBC);
/**
 * Encrypt / decrypt using the Cipher Feedback mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Cipher_feedback_.28CFB.29
 */
define('CRYPT_TWOFISH_MODE_CFB', CRYPT_MODE_CFB);
/**
 * Encrypt / decrypt using the Cipher Feedback mode.
 *
 * @link http://en.wikipedia.org/wiki/Block_cipher_modes_of_operation#Output_feedback_.28OFB.29
 */
define('CRYPT_TWOFISH_MODE_OFB', CRYPT_MODE_OFB);
/**#@-*/

