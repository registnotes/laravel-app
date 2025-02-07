from PIL import Image

# 画像の保存先ディレクトリ
image_dir = "/Users/ys/Downloads/female/"

# 1から10までの画像を繰り返す
for i in range(11, 21):
    # 画像のパス
    image_path = f"{image_dir}{i}.jpg"

    # 画像を開く
    image = Image.open(image_path)

    # 画像のサイズを取得
    width, height = image.size

    # 中央を切り取るための範囲を計算
    left = (width - 768) / 2
    top = (height - 768) / 2
    right = (width + 768) / 2
    bottom = (height + 768) / 2

    # 中央を切り取る
    cropped_image = image.crop((left, top, right, bottom))

    # 768x768にリサイズ
    resized_image = cropped_image.resize((768, 768))

    # 保存するパス
    save_path = f"{image_dir}{i}_resized.jpg"

    # 画像を保存
    resized_image.save(save_path)

    print(f"{image_path} -> {save_path}に保存されました。")
