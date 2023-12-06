<div class="contact-us" id="contact-us">
    <main>
        <div class="section-1">
            <h1>Contact <span>Us!</span></h1>
            <span>Do you want to contact us?</span>

            <form action="">
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <!-- <input type="number" name="number" placeholder="Phone number"> -->
                <textarea name="message" id="" placeholder="Message..." required></textarea>
                <button type="submit">Submit</button>
            </form>

            <div class="contacts">
                <div class="container-1">
                    <div class="icon"><img src="./assets/phone-icon.svg" alt="phone-icon"></div>
                    <div class="info">
                        <span>Phone</span>
                        <span><?= $contactNo ?></span>
                    </div>
                </div>
                <div class="container-2">
                    <div class="icon"><img src="./assets/email-icon.svg" alt="email-icon"></div>
                    <div class="info">
                        <span>Email</span>
                        <span><?= $email ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-2">
            <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d511.1614264664416!2d120.93732865690892!3d14.328073850183321!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d4fe164df6f9%3A0x8b27599e1e0a8580!2sZone%20IV%20Barangay%20Hall!5e0!3m2!1sen!2sph!4v1689258677058!5m2!1sen!2sph"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
        </div>
    </main>
</div>