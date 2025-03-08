# <div align="center">🚀 TrinsyCa Docker Kurulumu 🚀</div>
<div align="center">

**Trinsyca Docker** projesine hoş geldiniz<br>
Lütfen tercih ettiğiniz dili seçiniz

[<kbd> <br> İngilizce <br> </kbd>][EN]
[<kbd> <br> Türkçe <br> </kbd>][TR]

[TR]: README.tr.md
[EN]: https://github.com/TrinsyCa/Docker/?tab=readme-ov-file#-trinsyca-docker-setup-
</div>

## Bu proje ne için?

- **Bu proje, PHP projeleriniz için Docker yapılandırmalarını kolayca kurmanızı sağlar.**
- **Sadece birkaç komutla frontend, backend veya full-stack kurulumları entegre edebilirsiniz!**

## Kurulum 🚀

**Bu projeyi kendi projenize entegre etmek için, aşağıdaki komutu çalıştırın:**
```bash
composer require trinsyca/docker
```
**Bu, projenize gerekli Docker dosyalarını ve yapılandırmalarını ekleyecektir.**

## Mevcut Komutlar ⚙️

**Kurulum tamamlandıktan sonra, projeniz için Docker yapılandırmalarını kurmak için aşağıdaki Composer komutlarını kullanın:**

### Frontend Docker Kurulumu İçin:
  - ```bash
    composer trinsy:docker-frontend
    ```

### Backend Docker Kurulumu İçin:
  - ```bash
    composer trinsy:docker-backend
    ```

### Fullstack Docker Kurulumu (Frontend & Backend) İçin:
  - ```bash
    composer trinsy:docker-fullstack
    ```

### Docker Dosyalarını Kaldırmak İçin:
  - ```bash
    composer trinsy:docker-remove
    ```

## Nasıl Çalışır? 🔧

- **Frontend**: Frontend geliştirme için Docker yapılandırmasını ekler.
- **Backend**: Veritabanı ve API kurulumu dahil olmak üzere backend hizmetleri için Docker yapılandırmasını ekler.
- **Fullstack**: Hem frontend hem de backend Docker yapılandırmalarını birleştirir.
- **Remove**: Docker ile ilgili dosyaları projenizden güvenli bir şekilde kaldırır.

## Not 📌

**Docker dosyalarını kaldırmadan önce, işlemi onaylamanız için size bir onay sorusu sorulacaktır.**
