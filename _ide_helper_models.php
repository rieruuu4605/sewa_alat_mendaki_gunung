<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property int $idproduct
 * @property int $iduser
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\product $product
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereIdproduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereIduser($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereUpdatedAt($value)
 */
	class Cart extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereUpdatedAt($value)
 */
	class Contact extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $idproduct
 * @property int $iduser
 * @property string $metode_pembayaran
 * @property int $total_pembayaran
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\product $product
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereIdproduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereIduser($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereMetodePembayaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereTotalPembayaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereUpdatedAt($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $phonenumber
 * @property string $password
 * @property string $role
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cart|null $cart
 * @property-read \App\Models\customer|null $customer
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Order|null $order
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePhonenumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $iduser
 * @property string|null $alamat
 * @property string|null $telepon
 * @property int|null $kodepos
 * @property string|null $jeniskelamin
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|customer query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|customer whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|customer whereIduser($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|customer whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|customer whereJeniskelamin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|customer whereKodepos($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|customer whereTelepon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|customer whereUpdatedAt($value)
 */
	class customer extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $namaproduct
 * @property string $gambar
 * @property string $deskripsi
 * @property int $harga
 * @property int $stok
 * @property string|null $kategori
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cart|null $cart
 * @property-read \App\Models\Order|null $order
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product whereGambar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product whereHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product whereKategori($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product whereNamaproduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product whereStok($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product whereUpdatedAt($value)
 */
	class product extends \Eloquent {}
}

