INSERT INTO OWNER (OwnerID, Name, ContactInfo) VALUES
(1, 'John Smith', 'john.smith@email.com'),
(2, 'Alice Johnson', 'alice.johnson@email.com'),
(3, 'Robert Brown', 'robert.brown@email.com'),
(4, 'Jessica Green', 'jessica.green@email.com'),
(5, 'David Williams', 'david.williams@email.com'),
(6, 'Sophia Martinez', 'sophia.martinez@email.com'),
(7, 'Daniel Lee', 'daniel.lee@email.com'),
(8, 'Megan Hall', 'megan.hall@email.com'),
(9, 'Ethan Scott', 'ethan.scott@email.com'),
(10, 'Olivia Adams', 'olivia.adams@email.com');

INSERT INTO MANAGER (ManagerID, Name, ContactInfo, Department) VALUES
(1, 'Michael Carter', 'michael.carter@email.com', 'Talent Management'),
(2, 'Sarah Lee', 'sarah.lee@email.com', 'Event Coordination'),
(3, 'Daniel Wilson', 'daniel.wilson@email.com', 'Marketing'),
(4, 'Rebecca Adams', 'rebecca.adams@email.com', 'Public Relations'),
(5, 'Thomas Roberts', 'thomas.roberts@email.com', 'Artist Relations'),
(6, 'Hannah Thompson', 'hannah.thompson@email.com', 'Sponsorships'),
(7, 'Kevin White', 'kevin.white@email.com', 'Digital Media'),
(8, 'Natalie Brooks', 'natalie.brooks@email.com', 'Logistics'),
(9, 'Christopher Lewis', 'christopher.lewis@email.com', 'Contracts'),
(10, 'Amanda Foster', 'amanda.foster@email.com', 'Tour Management');

INSERT INTO ARTIST (ArtistID, Name, ContactInfo, AvailabilityStatus, Gender, DateOfBirth) VALUES
(1, 'Emily Brown', 'emily.brown@email.com', 'Available', 'F', '1990-06-15'),
(2, 'James White', 'james.white@email.com', 'Booked', 'M', '1988-11-23'),
(3, 'Sophia Miller', 'sophia.miller@email.com', 'Available', 'F', '1995-09-05'),
(4, 'Liam Harris', 'liam.harris@email.com', 'Booked', 'M', '1992-02-20'),
(5, 'Olivia Clark', 'olivia.clark@email.com', 'Available', 'F', '1998-12-11'),
(6, 'Benjamin King', 'benjamin.king@email.com', 'Booked', 'M', '1985-07-30'),
(7, 'Charlotte Parker', 'charlotte.parker@email.com', 'Available', 'F', '1993-03-25'),
(8, 'William Turner', 'william.turner@email.com', 'Booked', 'M', '1991-10-12'),
(9, 'Ava Collins', 'ava.collins@email.com', 'Available', 'F', '1996-05-08'),
(10, 'Lucas Evans', 'lucas.evans@email.com', 'Booked', 'M', '1989-09-18');

INSERT INTO CONTRACTED_ARTIST (ArtistID, ContractID, Salary) VALUES
(1, 101, 75000),
(2, 102, 68000),
(3, 110, 70000),
(4, 103, 72000),
(5, 104, 67000),
(6, 105, 71000),
(7, 106, 69000),
(8, 107, 73000),
(9, 108, 66000),
(10, 109, 74000);

INSERT INTO PROSPECTIVE_ARTIST (ArtistID, ApplicationStatus, PortfolioLink) VALUES
(1, 'Pending', 'http://portfolio.johndoe.com'),
(2, 'Accepted', 'http://portfolio.janedoe.com'),
(3, 'Under Review', 'http://portfolio.sophiamiller.com'),
(4, 'Under Review', 'http://portfolio.mikejohnson.com'),
(5, 'Pending', 'http://portfolio.oliviaclark.com'),
(6, 'Pending', 'http://portfolio.sarahlee.com'),
(7, 'Accepted', 'http://portfolio.charlotteparker.com'),
(8, 'Accepted', 'http://portfolio.michaelbrown.com'),
(9, 'Under Review', 'http://portfolio.avacollins.com'),
(10, 'Pending', 'http://portfolio.lucasevans.com');

INSERT INTO MARKETING (MarketingID, ArtistID, Promotion) VALUES
(1, 1, 'Social Media Campaign'),
(2, 2, 'TV Advertisement'),
(3, 3, 'Radio Interview'),
(4, 4, 'Online Ads'),
(5, 5, 'Magazine Feature'),
(6, 6, 'Podcast Sponsorship'),
(7, 7, 'Billboard Campaign'),
(8, 8, 'Influencer Partnership'),
(9, 9, 'Live Streaming Event'),
(10, 10, 'Music Video Promotion');

INSERT INTO TRAVEL (TravelID, ArtistID, TravelCost, Destination) VALUES
(1, 1, 500, 'Los Angeles, CA'),
(2, 2, 300, 'New York, NY'),
(3, 3, 450, 'San Francisco, CA'),
(4, 4, 700, 'Chicago, IL'),
(5, 5, 250, 'Austin, TX'),
(6, 6, 600, 'Las Vegas, NV'),
(7, 7, 550, 'Seattle, WA'),
(8, 8, 750, 'Atlanta, GA'),
(9, 9, 400, 'Boston, MA'),
(10, 10, 650, 'Dallas, TX');

INSERT INTO AVAILABILITY (AvailabilityID, ArtistID, Date, Status, Location) VALUES
(1, 1, '2025-03-10', 'Available', 'Chicago, IL'),
(2, 2, '2025-04-02', 'Unavailable', 'Miami, FL'),
(3, 3, '2025-05-15', 'Available', 'San Diego, CA'),
(4, 4, '2025-06-20', 'Unavailable', 'Seattle, WA'),
(5, 5, '2025-07-25', 'Available', 'Denver, CO'),
(6, 1, '2025-08-01', 'Unavailable', 'Los Angeles, CA'),
(7, 2, '2025-09-10', 'Available', 'New York, NY'),
(8, 3, '2025-10-05', 'Available', 'Dallas, TX'),
(9, 4, '2025-11-01', 'Unavailable', 'Austin, TX'),
(10, 5, '2025-12-15', 'Available', 'Boston, MA');

INSERT INTO EVENT (EventID, Name, Date, VenueID, OrganizerID) VALUES
(1, 'Music Fest 2025', '2025-07-10', 101, 201),
(2, 'Art Showcase', '2025-09-15', 102, 202),
(3, 'Comedy Night', '2025-08-05', 103, 203),
(4, 'Rock Concert', '2025-10-12', 104, 204),
(5, 'Dance Competition', '2025-11-20', 105, 205),
(6, 'Food Festival', '2025-06-30', 106, 206),
(7, 'Tech Expo', '2025-07-25', 107, 207),
(8, 'Film Screening', '2025-09-10', 108, 208),
(9, 'Outdoor Adventure', '2025-10-25', 109, 209),
(10, 'Theater Performance', '2024-11-05', 110, 210);

INSERT INTO SCHEDULE (ScheduleID, ArtistID, EventID, DateTime) VALUES
(1, 1, 1, '2025-07-10 18:00:00'),
(2, 2, 2, '2025-09-15 20:00:00'),
(3, 3, 3, '2025-08-05 19:30:00'),
(4, 4, 4, '2025-10-12 21:00:00'),
(5, 5, 5, '2025-11-20 17:00:00'),
(6, 1, 6, '2025-06-30 14:00:00'),
(7, 2, 7, '2025-07-25 10:00:00'),
(8, 3, 8, '2025-09-10 18:00:00'),
(9, 4, 9, '2025-10-25 15:00:00'),
(10, 5, 10, '2025-11-05 20:00:00');

INSERT INTO FINANCIAL_TRANSACTION (TransactionID, PaymentID, Amount, PaymentMethod, Date) VALUES
(1, 1, 5000, 'Credit Card', '2025-03-01'),
(2, 2, 7500, 'Bank Transfer', '2025-04-05'),
(3, 3, 6200, 'PayPal', '2025-05-10'),
(4, 4, 9800, 'Credit Card', '2025-06-15'),
(5, 5, 7200, 'Bank Transfer', '2025-07-01'),
(6, 6, 8800, 'Credit Card', '2025-08-25'),
(7, 7, 5400, 'PayPal', '2025-09-05'),
(8, 8, 6700, 'Bank Transfer', '2025-10-10'),
(9, 9, 8500, 'Credit Card', '2025-11-20'),
(10, 10, 9100, 'PayPal', '2025-12-05');

INSERT INTO PAYMENT (PaymentID, ArtistID, EventID, Amount, PaymentStatus) VALUES
(1, 1, 1, 5000, 'Paid'),
(2, 2, 2, 7500, 'Pending'),
(3, 3, 3, 6200, 'Paid'),
(4, 4, 4, 9800, 'Pending'),
(5, 5, 5, 7200, 'Paid'),
(6, 6, 6, 8800, 'Pending'),
(7, 7, 7, 5400, 'Paid'),
(8, 8, 8, 6700, 'Pending'),
(9, 9, 9, 8500, 'Paid'),
(10, 10, 10, 9100, 'Pending');

INSERT INTO PERFORMANCE (PerformanceID, ArtistID, Source, Summary, ReviewRatings) VALUES
(1, 1, 'Live Concert', 'Amazing performance in LA!', 4.8),
(2, 2, 'TV Appearance', 'Great show on national television!', 4.5),
(3, 3, 'Festival Performance', 'Unforgettable performance at Coachella!', 4.9),
(4, 4, 'Radio Interview', 'Very engaging live radio interview.', 4.2),
(5, 5, 'Music Video Shoot', 'Exciting shoot in the studio.', 4.3),
(6, 6, 'Press Conference', 'Great responses to fan questions.', 4.6),
(7, 7, 'Charity Event', 'Beautiful performance for a great cause.', 4.7),
(8, 8, 'Private Event', 'An intimate gathering with VIPs.', 4.4),
(9, 9, 'Award Show Performance', 'Stunning performance at the music awards.', 5.0),
(10, 10, 'Concert Tour', 'An incredible performance during the tour.', 4.8);

INSERT INTO VENUE (VenueID, Name, Location, Capacity) VALUES
(101, 'Staples Center', 'Los Angeles, CA', 20000),
(102, 'Madison Square Garden', 'New York, NY', 18000),
(103, 'The Forum', 'Los Angeles, CA', 17000),
(104, 'Radio City Music Hall', 'New York, NY', 6000),
(105, 'The Fillmore', 'San Francisco, CA', 1300),
(106, 'Wembley Stadium', 'London, UK', 90000),
(107, 'O2 Arena', 'London, UK', 20000),
(108, 'Barclays Center', 'Brooklyn, NY', 19000),
(109, 'Glastonbury Festival Site', 'Glastonbury, UK', 175000),
(110, 'Coachella Valley Music Festival', 'Indio, CA', 125000);

INSERT INTO PERFORMANCE_REPORT (ReportID, EventID, ArtistID, Rating, Comments) VALUES
(1, 1, 1, 5, 'Outstanding performance!'),
(2, 2, 2, 4.5, 'Well received by audience.'),
(3, 3, 3, 5, 'Absolutely incredible show at the festival!'),
(4, 4, 4, 4.2, 'Solid performance, but could have been more engaging.'),
(5, 5, 5, 4.8, 'Great vibe during the video shoot, everyone loved it!'),
(6, 6, 6, 4.6, 'Very professional and insightful responses in the conference.'),
(7, 7, 7, 4.9, 'Such a meaningful event, the performance was touching.'),
(8, 8, 8, 4.7, 'Perfect for the intimate setting, the crowd loved it.'),
(9, 9, 9, 5, 'This was the best performance of the awards night!'),
(10, 10, 10, 4.9, 'A spectacular tour performance that captured everyone’s heart.');

INSERT INTO EVENT_ORGANIZER (OrganizerID, Name, ContactInfo) VALUES
(201, 'Jake Brown', 'jake.brown@email.com'),
(202, 'Laura Davis', 'laura.davis@email.com'),
(203, 'Megan Clark', 'megan.clark@email.com'),
(204, 'John Adams', 'john.adams@email.com'),
(205, 'Evan Miller', 'evan.miller@email.com'),
(206, 'Sophia Turner', 'sophia.turner@email.com'),
(207, 'David Johnson', 'david.johnson@email.com'),
(208, 'Emily White', 'emily.white@email.com'),
(209, 'Michael Lee', 'michael.lee@email.com'),
(210, 'Linda Evans', 'linda.evans@email.com');

INSERT INTO CONTRACT (ContractID, ArtistID, ManagerID, EventID, Terms, StartDate, EndDate) VALUES
(101, 1, 1, 1, 'One-year exclusive contract', '2025-01-01', '2025-12-31'),
(102, 2, 2, 2, 'Six-month contract', '2025-03-01', '2025-09-01'),
(103, 3, 3, 3, 'Two-year contract', '2025-04-15', '2027-04-15'),
(104, 4, 4, 4, 'One-year contract with performance bonus', '2025-06-01', '2026-06-01'),
(105, 5, 5, 5, 'Three-month contract', '2025-05-01', '2025-07-31'),
(106, 6, 6, 6, 'Two-year contract with performance incentives', '2025-02-15', '2027-02-15'),
(107, 7, 7, 7, 'One-year renewal contract', '2025-07-01', '2026-07-01'),
(108, 8, 8, 8, 'Six-month contract for promotional events', '2025-08-01', '2026-01-31'),
(109, 9, 9, 9, 'Exclusive two-year contract', '2025-09-01', '2027-09-01'),
(110, 10, 10, 10, 'One-year contract for the music video tour', '2023-10-01', '2024-01-01');

INSERT INTO FINANCE (TransactionID, ContractID, Earning, TaxDeduction, FinalPayment) VALUES
(1, 101, 6000, 500, 5500),
(2, 102, 8000, 700, 7300),
(3, 103, 9000, 750, 8250),
(4, 104, 11000, 950, 10550),
(5, 105, 6500, 600, 5900),
(6, 106, 8500, 700, 7800),
(7, 107, 9200, 800, 8400),
(8, 108, 10500, 900, 9600),
(9, 109, 11500, 1000, 10500),
(10, 110, 12500, 1100, 11400);

INSERT INTO PERFORMANCE_REFERENCES (ReferenceID, PerformanceID) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);
